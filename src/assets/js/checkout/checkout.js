import { ProductStorage } from '../utils/product/product-storage.js';

class Checkout {
    #checkoutContainerSelector = '[data-checkout-container]';
    #checkoutSummarySelector = '[data-checkout-summary]';

    #productStorage;
    #productsMap;

    #products = [];

    async init() {
        this.#initProductStorage();
        this.#setProductsMap();

        await this.#fetchProducts();

        this.#generateProductsHTML();
        this.#setCheckoutSummaryPrice();
    }

    #initProductStorage() {
        this.#productStorage = new ProductStorage();
    }

    #setProductsMap() {
        this.#productsMap = this.#productStorage.get();
    }

    async #fetchProducts() {
        const productIds = Array.from(this.#productsMap.keys());
        const productIdsString = productIds.map(productId => `productIds[]=${productId}`)
            .join('&');
        const response = await fetch(`/app/checkout/checkout?${productIdsString}`);

        this.#products = await response.json();
    }

    #generateProductsHTML() {
        const productsHTML = this.#products.reduce((products, product) => products + this.#getProductHTML(product), '');
        const productsContainerElement = document.querySelector(this.#checkoutContainerSelector);

        productsContainerElement.innerHTML = productsHTML;
    }

    #getProductHTML(product) {
        const productCount = this.#productsMap.get(String(product.id));
        const productName = product.name;
        const productPrice = product.price;

        return `
            <li class="mb-4 is-flex is-justify-content-space-between">
                <span>${productName}</span>
                <span>-</span>
                <span class="tag is-medium"><b>${productCount} x ${productPrice} zł</b></span>
            </li>
        `;
    }

    #setCheckoutSummaryPrice() {
        const summary = this.#products.map(product => product.price)
            .reduce((summaryPrice, productPrice) => summaryPrice + productPrice, 0);

        document.querySelector(this.#checkoutSummarySelector).textContent = summary;
    }
}

window.addEventListener('load', () => {
    const checkout = new Checkout();

    checkout.init();
})
