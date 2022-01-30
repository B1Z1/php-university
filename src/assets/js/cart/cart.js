class Cart {
    #productsLsKey = 'up-shop-products';

    #buttonSelector = '[data-cart]';

    #checkoutButtonActiveClass = 'up-cart-button--active';
    #checkoutButtonSelector = '[data-cart-button]';
    #checkoutCountButtonSelector = '[data-cart-counter]';

    #productsMap;

    #productsCount = 0;

    init() {
        this.#setProductsMap();
        this.#initializeProductsCount();

        if (this.#productsCount > 0) {
            this.#updateCheckoutButtonCount();
            this.#showCheckoutButton();
        }

        this.#observeButtonsClick();
    }

    #setProductsMap() {
        this.#productsMap = this.#getProductMapFromLs();
    }

    #getProductMapFromLs() {
        const productsRaw = localStorage.getItem(this.#productsLsKey);
        let productsMap = new Map();

        if (productsRaw) {
            productsMap = new Map(JSON.parse(productsRaw));
        }

        return productsMap;
    }

    #observeButtonsClick() {
        document.querySelectorAll(this.#buttonSelector)
            .forEach((button) => {
                this.#observeButtonClick(button);
            });
    }

    #observeButtonClick(button) {
        button.addEventListener('click', () => {
            this.#updateProducts(button);
            this.#storeProductsToLs();

            this.#increaseProductsCount();
            this.#showCheckoutButton();
            this.#updateCheckoutButtonCount();
        });
    }

    #updateProducts(button) {
        const productId = button.dataset.cart;
        const productCount = this.#productsMap.get(productId) || 0;

        this.#productsMap.set(productId, productCount + 1);
    }

    #storeProductsToLs() {
        const productsArray = Array.from(this.#productsMap.entries());
        const productsRaw = JSON.stringify(productsArray);

        localStorage.setItem(this.#productsLsKey, productsRaw);
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
}

window.addEventListener('load', () => {
    const cart = new Cart();

    cart.init();
});
