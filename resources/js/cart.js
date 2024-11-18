document.addEventListener('alpine:init', () => {
    Alpine.data('cart', () => ({
        items: JSON.parse(localStorage.getItem('cart')) || [],

        addToCart(product) {
            let item = this.items.find(i => i.id === product.id);
            if (item) {
                item.quantity += 1;
            } else {
                this.items.push({
                    id: product.id,
                    price: product.price,
                    quantity: 1,
                });
            }
            this.saveCart();
        },

        removeFromCart(productId) {
            this.items = this.items.filter(item => item.id !== productId);
            this.saveCart();
        },

        clearCart() {
            this.items = [];
            this.saveCart();
        },

        saveCart() {
            localStorage.setItem('cart', JSON.stringify(this.items));
        },

        get totalPrice() {
            return this.items.reduce((sum, item) => sum + item.price * item.quantity, 0).toFixed(2);
        },

        get totalItems() {
            const totalItems = this.items.reduce((sum, item) => sum + item.quantity, 0);
            return totalItems.toString();
        }
    }));
});