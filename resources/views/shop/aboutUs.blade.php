<x-home-layout>
    <div class="container py-4 flex items-center gap-3 ml-8">
        <a href="/" class="text-blue-500 hover:text-blue-700">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <a href="/aboutUs" class="text-gray-600 font-medium hover:text-blue-700">
            Sobre nosotros
        </a>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-4xl font-extrabold mb-6 text-gray-800 text-center underline">Sobre Nosotros</h1>
            <p class="mb-8 text-lg text-gray-700 leading-relaxed">
                Bienvenidos a nuestra tienda en línea. Somos una empresa dedicada a ofrecer los mejores productos a nuestros clientes. Nuestro compromiso es brindar un servicio de calidad y satisfacer las necesidades de nuestros compradores.
            </p>

            <h2 class="text-3xl font-bold mb-6 text-gray-800">Preguntas Frecuentes</h2>
            <div id="faq" class="space-y-6">
                <div class="border-b pb-4">
                    <button class="w-full text-left py-2 text-lg font-semibold text-gray-800 hover:text-blue-700 flex items-center justify-between" onclick="toggleAnswer('answer1', this)">
                        ¿Cuál es el tiempo de entrega?
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div id="answer1" class="max-h-0 overflow-hidden transition-all duration-500">
                        <p class="py-2 text-gray-700">
                            El tiempo de entrega estimado es de 3 a 5 días hábiles.
                        </p>
                    </div>
                </div>
                <div class="border-b pb-4">
                    <button class="w-full text-left py-2 text-lg font-semibold text-gray-800 hover:text-blue-700 flex items-center justify-between" onclick="toggleAnswer('answer2', this)">
                        ¿Cuál es nuestra política de devoluciones?
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div id="answer2" class="max-h-0 overflow-hidden transition-all duration-500">
                        <p class="py-2 text-gray-700">
                            Aceptamos devoluciones dentro de los 30 días posteriores a la compra.
                        </p>
                    </div>
                </div>
                <div class="border-b pb-4">
                    <button class="w-full text-left py-2 text-lg font-semibold text-gray-800 hover:text-blue-700 flex items-center justify-between" onclick="toggleAnswer('answer3', this)">
                        ¿Cómo puedo contactar con atención al cliente?
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div id="answer3" class="max-h-0 overflow-hidden transition-all duration-500">
                        <p class="py-2 text-gray-700">
                            Puedes contactarnos a través de nuestro formulario de contacto o llamando al 123-456-7890.
                        </p>
                    </div>
                </div>
                <div class="border-b pb-4">
                    <button class="w-full text-left py-2 text-lg font-semibold text-gray-800 hover:text-blue-700 flex items-center justify-between" onclick="toggleAnswer('answer4', this)">
                        ¿Tienen envío gratis?
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div id="answer4" class="max-h-0 overflow-hidden transition-all duration-500">
                        <p class="py-2 text-gray-700">
                            Sí, ofrecemos envío gratis en pedidos a partir de $60,000.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleAnswer(id, button) {
            var answer = document.getElementById(id);
            var icon = button.querySelector('i');
            if (answer.classList.contains('max-h-0')) {
                answer.classList.remove('max-h-0');
                answer.classList.add('max-h-screen');
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            } else {
                answer.classList.remove('max-h-screen');
                answer.classList.add('max-h-0');
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        }
    </script>
</x-home-layout>