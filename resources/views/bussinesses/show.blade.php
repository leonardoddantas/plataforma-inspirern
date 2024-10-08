<!-- resources/views/business/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $business->businessName }} - Detalhes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<header class="bg-blue-950 text-white py-8 shadow-lg">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-bold">{{ $business->businessName }}</h1>
            <p class="text-lg mt-2">{{ $business->city }}, {{ $business->state }}</p>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            
            <!-- Coluna da imagem -->
            <div class="md:col-span-1">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/'.$business->locationPhoto) }}" alt="{{ $business->businessName }}" class="w-full h-64 object-cover">
                </div>
            </div>

            <!-- Coluna com informações detalhadas -->
            <div class="md:col-span-2">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-3xl font-semibold mb-4">Sobre o Local</h2>
                    <p class="text-gray-700 mb-6">{{ $business->category }}</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-xl font-semibold">Endereço</h3>
                            <p class="text-gray-600">{{ $business->road }}, {{ $business->number }}</p>
                            <p class="text-gray-600">{{ $business->city }}, {{ $business->state }}</p>
                        </div>
                        
                        <div>
                            <h3 class="text-xl font-semibold">Contato</h3>
                            <p class="text-gray-600">Telefone: {{ $business->contact }}</p>
                            @if($business->email)
                                <p class="text-gray-600">Email: {{ $business->email }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Seções adicionais -->
                    <div class="mt-8">
                        <h3 class="text-2xl font-semibold mb-4">Horários de Funcionamento</h3>
                        <ul class="text-gray-600">
                            <li>Segunda a Sexta: 08:00 - 18:00</li>
                            <li>Sábado: 08:00 - 14:00</li>
                            <li>Domingo: Fechado</li>
                        </ul>
                    </div>

                    @if($business->socials && $business->socials->isNotEmpty())
                        <div class="mt-8">
                            <h3 class="text-2xl font-semibold mb-4">Redes Sociais</h3>
                            <div class="flex space-x-4">
                                @foreach($business->socials as $social)
                                    @php
                                        $icon = '';
                                        switch (strtolower($social->socialMediaName)) {
                                            case 'facebook':
                                                $icon = 'fab fa-facebook-f';
                                                break;
                                            case 'instagram':
                                                $icon = 'fab fa-instagram';
                                                break;
                                            case 'twitter':
                                                $icon = 'fab fa-twitter';
                                                break;
                                            case 'whatsapp':
                                                $icon = 'fab fa-whatsapp';
                                                break;
                                            default:
                                                $icon = 'fas fa-globe';
                                                break;
                                        }
                                @endphp
                                    <a href="{{ $social->socialMediaURL }}" class="text-blue-500 hover:text-blue-700" target="_blank">
                                        <i class="{{ $icon }} fa-2x"></i>
                                    </a>
                                @endforeach
                                </div>
                            </div>
                        @endif
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded p-6 mt-8">
            <h2 class="text-2xl font-bold mb-4">Sobre o Local</h2>
            <div class="text-lg columns-2 gap-8">
                <p>
                    O Restaurante Mar e Sol é um dos destinos mais requisitados por turistas e locais no coração do Rio Grande do Norte. 
                    Oferecendo uma experiência única, combinando pratos tradicionais com toques contemporâneos, o restaurante é reconhecido 
                    por seu ambiente acolhedor e vista espetacular para o mar.  O Restaurante Mar e Sol é um dos destinos mais requisitados por turistas e locais no coração do Rio Grande do Norte. 
                    Oferecendo uma experiência única, combinando pratos tradicionais com toques contemporâneos, o restaurante é reconhecido 
                    por seu ambiente acolhedor e vista espetacular para o mar.
                </p>
                <p>
                    Além de uma vasta seleção de frutos do mar frescos, o Mar e Sol também dispõe de opções vegetarianas e sobremesas 
                    artesanais, garantindo uma refeição inesquecível para todos os gostos. Visite-nos e experimente o que há de melhor 
                    na culinária regional.  Além de uma vasta seleção de frutos do mar frescos, o Mar e Sol também dispõe de opções vegetarianas e sobremesas 
                    artesanais, garantindo uma refeição inesquecível para todos os gostos. Visite-nos e experimente o que há de melhor 
                    na culinária regional.
                </p>
            </div>
        </div>

        <div class="bg-white shadow-md rounded p-6 mt-8">
    <h2 class="text-2xl font-bold mb-4">Galeria de Fotos</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" alt="Foto 1" class="w-full h-40 object-cover rounded">
        <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" class="w-full h-40 object-cover rounded">
        <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" class="w-full h-40 object-cover rounded">
        <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" class="w-full h-40 object-cover rounded">
        <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" alt="Foto 1" class="w-full h-40 object-cover rounded">
        <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" class="w-full h-40 object-cover rounded">
        <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" class="w-full h-40 object-cover rounded">
        <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" class="w-full h-40 object-cover rounded">
    </div>
</div>


        <div class="bg-white shadow-md rounded p-6 mt-8">
    <h2 class="text-2xl font-bold mb-4">Avaliações</h2>

    <!-- Avaliações Existentes -->
    <div class="space-y-4">
    @if($business->reviews->isEmpty())
        <p class="text-gray-600">Nenhuma avaliação disponível no momento.</p>
    @else
        @foreach($business->reviews as $review)
            <div class="bg-gray-100 p-4 rounded">
                <!-- Nome do Usuário -->
                <p class="text-lg font-semibold">{{ $review->user->name }}</p>
                
                <!-- Comentário da Avaliação -->
                <p class="text-gray-600">"{{ $review->comment }}"</p>
                
                <!-- Avaliação em estrelas -->
                <div class="text-yellow-500">
                    @for($i = 0; $i < $review->numberStars; $i++)
                        ★
                    @endfor
                    @for($i = $review->numberStars; $i < 5; $i++)
                        ☆
                    @endfor
                </div>
            </div>
        @endforeach
    @endif
</div>

    <!-- Formulário de Nova Avaliação -->
    <div class="mt-8">
        <h3 class="text-xl font-bold mb-4">Deixe sua Avaliação</h3>
        <form action="{{ route('review', $business->id) }}" method="POST" class="space-y-4">
            @csrf

            <!-- Campo Comentário -->
            <div>
                <label for="comment" class="block text-sm font-medium text-gray-700">Comentário</label>
                <textarea name="comment" id="comment" class="mt-1 p-2 border border-gray-300 rounded w-full h-24" placeholder="Escreva seu comentário" required></textarea>
            </div>

            <!-- Avaliação com Estrelas -->
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700">Avaliação</label>
                <div id="rating" class="flex items-center space-x-2">
                    <button type="button" class="star text-2xl text-gray-400 hover:text-yellow-500 transition" data-value="1">★</button>
                    <button type="button" class="star text-2xl text-gray-400 hover:text-yellow-500 transition" data-value="2">★</button>
                    <button type="button" class="star text-2xl text-gray-400 hover:text-yellow-500 transition" data-value="3">★</button>
                    <button type="button" class="star text-2xl text-gray-400 hover:text-yellow-500 transition" data-value="4">★</button>
                    <button type="button" class="star text-2xl text-gray-400 hover:text-yellow-500 transition" data-value="5">★</button>
                </div>
                <input type="hidden" name="rating" id="rating-value" required>
            </div>

            <!-- Botão Enviar -->
            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enviar Avaliação</button>
            </div>
        </form>
    </div>
</div>


<div class="bg-white shadow-md rounded p-6 mt-8">
    <h2 class="text-2xl font-bold mb-4">Localização</h2>
    <iframe 
        src="https://www.google.com/maps/embed?pb=..."
        width="100%" height="400" class="rounded"
        allowfullscreen="" loading="lazy"></iframe>
</div>

</div>

    </main>

    <footer class="bg-gray-900 text-white py-10">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Sobre nós -->
        <div>
            <h3 class="text-xl font-semibold mb-4">Sobre Nós</h3>
            <p class="text-gray-400">O INSPIRERN é sua plataforma de referência para explorar os melhores destinos, restaurantes e hospedagens no Rio Grande do Norte. Descubra o que torna o nosso estado um dos mais encantadores do Brasil.</p>
        </div>

        <!-- Ajudar -->
        <div>
            <h3 class="text-xl font-semibold mb-4">Precisa de ajudar?</h3>
            <ul class="text-gray-400 space-y-2">
            <li><p>(00) 00000-0000</p></li>
            <li><p>inspirern@gmail.com</p></li>
            <li><p>CNPJ: 00.000.000/0000-00</p></li>
            <li><p>Rua Desembargador Ferreira Mendes,<br>233 - Sala 43 - Edifício Master Center<br>Centro Norte - Cuiabá - Mato Grosso - <br>CEP: 78020-200</p></li>
            </ul>
        </div>

        <!-- Links rápidos -->
        <div>
            <h3 class="text-xl font-semibold mb-4">Links Rápidos</h3>
            <ul class="text-gray-400 space-y-2">
            <li><a href="#" class="hover:text-white transition">Início</a></li>
            <li><a href="#" class="hover:text-white transition">Destinos</a></li>
            <li><a href="#" class="hover:text-white transition">Restaurantes</a></li>
            <li><a href="#" class="hover:text-white transition">Hospedagem</a></li>
            </ul>
        </div>
        </div>

        <div class="mt-10 text-center text-gray-600">
        <p>&copy; 2024 INSPIRERN. Todos os direitos reservados.</p>
        </div>
    </footer>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star');
    const ratingValue = document.getElementById('rating-value');

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const value = this.getAttribute('data-value');
            ratingValue.value = value;

            // Atualiza a exibição visual das estrelas
            stars.forEach((s, index) => {
                if (index < value) {
                    s.classList.remove('text-white');
                    s.classList.add('text-yellow-500');
                } else {
                    s.classList.remove('text-yellow-500');
                    s.classList.add('text-white');
                }
            });
        });
    });
});

</script>
</body>
</html>
