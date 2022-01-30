export class ProductStorage {
    #productsLsKey = 'up-shop-products';

    constructor() {
    }

    get() {
        const productsRaw = localStorage.getItem(this.#productsLsKey);
        let productsMap = new Map();

        if (productsRaw) {
            productsMap = new Map(JSON.parse(productsRaw));
        }

        return productsMap;
    }

    set(productsMap) {
        const productsArray = Array.from(productsMap.entries());
        const productsRaw = JSON.stringify(productsArray);

        localStorage.setItem(this.#productsLsKey, productsRaw);
    }
}
