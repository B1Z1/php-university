class AdminPage {
    #productEditButtonSelector = '[data-admin-product-edit]';
    #productCancelButtonSelector = '[data-admin-product-cancel]';
    #editFormTemplateSelector = '[data-admin-edit-form-template]';
    #editFormSelector = '[data-admin-edit-form]';

    #currentEditingId;

    init() {
        this.#observeEditButtonsClick();
        this.#observeCancelButtonsClick();
    }

    #observeEditButtonsClick() {
        document.querySelectorAll(this.#productEditButtonSelector)
            .forEach((editButton) => {
                this.#observeEditButtonClick(editButton);
            });
    }

    #observeEditButtonClick(button) {
        button.addEventListener('click', () => {
            const productId = Number(button.dataset.adminProductEdit);

            if (document.querySelector(this.#editFormSelector)) {
                const currentEditingProductElement = this.#getProductElement(this.#currentEditingId);
                const cancelButtonElement = currentEditingProductElement.querySelector(this.#productCancelButtonSelector);
                const editButtonElement = currentEditingProductElement.querySelector(this.#productEditButtonSelector);

                this.#removeEditForm();

                this.#hideButton(cancelButtonElement);
                this.#showButton(editButtonElement);
            }

            this.#currentEditingId = productId;

            const cancelButtonElement = this.#getProductElement(productId).querySelector(this.#productCancelButtonSelector);

            this.#addFormToHtml(productId);

            this.#hideButton(button);
            this.#showButton(cancelButtonElement);
        });
    }

    #observeCancelButtonsClick() {
        document.querySelectorAll(this.#productCancelButtonSelector)
            .forEach((cancelButton) => {
                this.#observeCancelButtonClick(cancelButton);
            });
    }

    #observeCancelButtonClick(button) {
        button.addEventListener('click', () => {
            const productId = Number(button.dataset.adminProductCancel);

            if (document.querySelector(this.#editFormSelector)) {
                this.#removeEditForm();
            }

            const editButtonElement = this.#getProductElement(productId).querySelector(this.#productEditButtonSelector);

            this.#hideButton(button);
            this.#showButton(editButtonElement);
        });
    }

    #getProductSelector(id) {
        return `[data-product="${id}"]`;
    }

    #addFormToHtml(productId) {
        const templateElement = document.querySelector(this.#editFormTemplateSelector).content.cloneNode(true);
        const formElement = templateElement.querySelector(this.#editFormSelector);
        const productElement = this.#getProductElement(productId);

        formElement.name.value = productElement.dataset.productName;
        formElement.description.value = productElement.dataset.productDescription;
        formElement.price.value = productElement.dataset.productPrice;
        formElement.productId.value = productId;

        productElement.append(templateElement);
    }

    #getProductElement(productId) {
        return document.querySelector(this.#getProductSelector(productId));
    }

    #removeEditForm() {
        document.querySelector(this.#editFormSelector).remove();
    }

    #hideButton(button) {
        button.classList.add('is-hidden');
    }

    #showButton(button) {
        button.classList.remove('is-hidden');
    }
}

window.addEventListener('load', () => {
    const adminPage = new AdminPage();

    adminPage.init();
});
