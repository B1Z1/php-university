import { ProductStorage } from '../utils/product/product-storage.js';

class Cart {
    #buttonAddSelector = '[data-cart-add]';
    #buttonRemoveSelector = '[data-cart-remove]';

    #checkoutButtonActiveClass = 'up-cart-button--active';
    #checkoutButtonSelector = '[data-cart-button]';
    #checkoutCountButtonSelector = '[data-cart-counter]';

    #productStorage;
    #productsMap;

    #productsCount = 0;

    init() {
        this.#initProductStorage();
        this.#setProductsMap();
        this.#initializeProductsCount();

        if (this.#productsCount > 0) {
            this.#updateCheckoutButtonCount();
            this.#showCheckoutButton();
        }

        this.#observeButtonsAddClick();
        this.#observeButtonsRemoveClick();
    }

    #setProductsMap() {
        this.#productsMap = this.#productStorage.get();
    }

    #observeButtonsAddClick() {
        document.querySelectorAll(this.#buttonAddSelector)
            .forEach((button) => {
                this.#observeButtonAddClick(button);
            });
    }

    #observeButtonsRemoveClick() {
        document.querySelectorAll(this.#buttonRemoveSelector)
            .forEach((button) => {
                this.#observeButtonRemoveClick(button);
            });
    }

    #observeButtonAddClick(button) {
        button.addEventListener('click', () => {
            this.#addProduct(button);
            this.#storeProductsToLs();

            this.#increaseProductsCount();
            this.#showCheckoutButton();
            this.#updateCheckoutButtonCount();
        });
    }

    #observeButtonRemoveClick(button) {
        button.addEventListener('click', () => {
            this.#removeProduct(button);
            this.#storeProductsToLs();

            this.#decreaseProductsCount();
            this.#showCheckoutButton();
            this.#updateCheckoutButtonCount();
        });
    }

    #removeProduct(button) {
        const productId = button.dataset.cartRemove;
        const productCount = this.#productsMap.get(productId) || 0;
        const productEndCount = productCount - 1 < 0 ? 0 : productCount - 1;

        this.#productsMap.set(productId, productEndCount);
    }

    #addProduct(button) {
        const productId = button.dataset.cartAdd;
        const productCount = this.#productsMap.get(productId) || 0;

        this.#productsMap.set(productId, productCount + 1);
    }

    #storeProductsToLs() {
        this.#productStorage.set(this.#productsMap);
    }

    #initializeProductsCount() {
        let summaryCount = 0;

        for (const count of this.#productsMap.values()) {
            summaryCount += count;
        }

        this.#productsCount = summaryCount;
    }

    #increaseProductsCount() {
        this.#productsCount++;
    }

    #decreaseProductsCount() {
        this.#productsCount = this.#productsCount - 1 < 0 ? 0 : this.#productsCount - 1;
    }

    #updateCheckoutButtonCount() {
        const countElement = document.querySelector(this.#checkoutCountButtonSelector);

        countElement.textContent = this.#productsCount;
    }

    #showCheckoutButton() {
        const checkoutButton = document.querySelector(this.#checkoutButtonSelector);

        if (checkoutButton.classList.contains(this.#checkoutButtonActiveClass)) {
            return;
        }

        checkoutButton.classList.add(this.#checkoutButtonActiveClass);
    }

    #initProductStorage() {
        this.#productStorage = new ProductStorage();
    }
}

window.addEventListener('load', () => {
    const cart = new Cart();

    cart.init();
});
