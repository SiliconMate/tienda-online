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
                    name: product.name,
                    description: product.description,
                    price: product.price,
                    code: product.code,
                    category: product.category,
                    image: product.image,
                    quantity: 1
                });
            }
            this.saveCart();
            alert(`Producto agregado al carrito.`);
            location.reload();
        },

        incrementQuantity(productId) {
            let item = this.items.find(i => i.id === productId);
            item.quantity += 1;
            this.saveCart();
        },

        decrementQuantity(productId) {
            let item = this.items.find(i => i.id === productId);
            if (item.quantity > 1) {
                item.quantity -= 1;
            } else {
                this.removeFromCart(productId);
            }
            this.saveCart();
        },

        removeFromCart(productId) {
            this.items = this.items.filter(item => item.id !== productId);
            this.saveCart();
            location.reload();
        },

        clearCart() {
            this.items = [];
            this.saveCart();
            location.reload();
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
        },

        processCheckout() {
            fetch(window.routes.checkoutStore, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ items: this.items })
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                    this.clearCart();
                    window.location.href = '/checkout';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un problema al procesar la compra.');
            });
        }
    }));
});