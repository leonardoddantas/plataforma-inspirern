<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

    {{-- Header --}}
    <header class="bg-blue-950">
        <div class="relative z-10 container mx-auto px-4 h-full">
        <nav class="flex flex-row items-center justify-between h-20 text-xl text-slate-50">
            <a href="http://">Logo</a>
            <ul class="flex flex-row items-center justify-center space-x-4">
            <li class="hover:text-blue-500 transition"><a href="http://">Home</a></li>
            <li class="hover:text-blue-500 hover:font-semibold transition"><a href="http://">Restaurantes</a></li>
            <li class="hover:text-blue-500 hover:font-semibold transition"><a href="http://">Pontos Turistícos</a></li>
            <li class="hover:text-blue-500 hover:font-semibold transition"><a href="http://">Hospedagens</a></li>
            <li class="hover:text-blue-500 hover:font-semibold transition"><a href="http://">Cidades</a></li>
            </ul>
        </nav>

        <div class="py-14 text-slate-50">
            <form action="{{ route('search') }}" method="GET" class="flex flex-row p-8 bg-blue-800 rounded z-20 text-lg text-slate-950 space-x-4 shadow-lg">
                @csrf
                <input name="businessName" type="text" placeholder="Nome de um negócio" class="w-2/5 p-2 rounded flex-grow shadow-sm">

                <select name="category" placeholder="Categoria" class="w-1/5 p-2 rounded flex-grow shadow-sm">
                    <option value="">Selecione uma categoria</option>
                    <option value="restaurante">Restaurantes</option>
                    <option value="hospedagem">Hospedagens</option>
                    <option value="ponto_turistico">Ponto Turístico</option>
                </select>

                <div class="relative w-1/5">
                    <input name="city" type="text" id="cityInput" class="w-full p-2 rounded shadow-sm" placeholder="Digite a cidade" onkeyup="autocompleteCity()">
                    
                    <ul id="citySuggestions" class="absolute w-full bg-white shadow-lg rounded mt-1 max-h-48 overflow-y-auto hidden z-50 text-black"></ul>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded flex-grow shadow-md hover:bg-blue-500 hover:shadow-lg transform hover:scale-105 transition">Pesquisar</button>
            </form>
        </div>
        </div>
    </header>

    <main class="pt-28 bg-gray-50 pb-28">
        <div class="relative z-10 container mx-auto px-4 h-full">

            {{-- Resultado da pesquisa --}}
            <section>
                <div class="flex flex-row space-x-5 mb-5">
                    <div class="w-1/4">
                        <img src="{{asset('storage/img/mapa.jpg')}}" alt="Mapa do local pesquisado" class="rounded shadow-md w-full">
                    </div>
                    <div class="w-3/4">
                        <h2 class="mb-3 text-2xl font-medium tracking-wide">Rio de Janeiro: 5.167 acomodações encontradas(Resultado)</h2>
                        <select placeholder="Ordenar por:" class="p-2 bg-blue-950 border rounded text-gray-50 shadow-md">
                            <option value="">Ordenar por:</option>
                            <option value="restaurante">Ordenar por: mais avaliados</option>
                            <option value="hospedagem">Ordenar por: ordem alfabética</option>
                            <option value="ponto_turistico">Ordenar por: preços mais baixos</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-row items-start space-x-5">
                  <div class="w-1/4 p-4 bg-gray-100 rounded shadow-md">
        <h4 class="mb-5 pb-1 text-lg border-b border-gray-600">Filtrar resultados por:</h4>
        <form action="{{ route('search') }}" method="GET">
            <!-- Tipo de Negócio -->
            <div class="mb-4">
                <h4 class="mb-2 text-lg">Tipo de Negócio</h4>
                <div class="mb-1">
                    <input type="checkbox" name="property_type[]" id="casa" value="casa" class="mr-2" {{ in_array('casa', request('property_type', [])) ? 'checked' : '' }}>
                    <label for="casa" class="text-gray-800">Casa</label>
                </div>
                <div class="mb-1">
                    <input type="checkbox" name="property_type[]" id="apartamento" value="apartamento" class="mr-2" {{ in_array('apartamento', request('property_type', [])) ? 'checked' : '' }}>
                    <label for="apartamento" class="text-gray-800">Apartamento</label>
                </div>
                <div class="mb-1">
                    <input type="checkbox" name="property_type[]" id="pousada" value="pousada" class="mr-2" {{ in_array('pousada', request('property_type', [])) ? 'checked' : '' }}>
                    <label for="pousada" class="text-gray-800">Pousada</label>
                </div>
                 <div class="mb-1">
                    <input type="checkbox" name="property_type[]" id="bar" value="bar" class="mr-2" {{ in_array('bar', request('property_type', [])) ? 'checked' : '' }}>
                    <label for="bar" class="text-gray-800">Bar</label>
                </div>
                 <div class="mb-1">
                    <input type="checkbox" name="property_type[]" id="humbergeria" value="humbergeria" class="mr-2" {{ in_array('humbergeria', request('property_type', [])) ? 'checked' : '' }}>
                    <label for="humbergeria" class="text-gray-800">Humbergeria</label>
                </div>
            </div>

            <!-- Faixa de Preço (R$) -->
            <div class="mb-4">
                <h4 class="mb-2 text-lg">Faixa de Preço (R$)</h4>
                <div class="flex items-center justify-between">
                    <span id="min-value" class="text-blue-950">R$0</span>
                    <span id="max-value" class="text-blue-950">R$1000+</span>
                </div>
                <input type="range" min="0" max="1000" value="500" step="50" id="price-range" class="w-full mt-2">
            </div>

            <!-- Número de Quartos -->
            <div class="mb-4">
                <h4 class="mb-2 text-lg">Número de Quartos</h4>
                <div class="mb-1">
                    <input type="radio" name="num_rooms" id="um_quarto" value="1" class="mr-2" {{ request('num_rooms') == '1' ? 'checked' : '' }}>
                    <label for="um_quarto" class="text-gray-800">1 Quarto</label>
                </div>
                
            </div>

            <!-- Comodidades -->
            <div class="mb-4">
                <h4 class="mb-2 text-lg">Comodidades</h4>
                <div class="mb-1">
                    <input type="checkbox" name="amenities[]" id="wifi" value="wifi" class="mr-2" {{ in_array('wifi', request('amenities', [])) ? 'checked' : '' }}>
                    <label for="wifi" class="text-gray-800">Wi-Fi</label>
                </div>
                
            </div>

            <!-- Classificação -->
            <div class="mb-4">
                <h4 class="mb-2 text-lg">Classificação</h4>
                <div class="mb-1">
                    <input type="radio" name="rating" id="cinco_estrelas" value="5" class="mr-2" {{ request('rating') == '5' ? 'checked' : '' }}>
                    <label for="cinco_estrelas" class="text-gray-800">5 Estrelas</label>
                </div>
                <div class="mb-1">
                    <input type="radio" name="rating" id="quatro_estrelas" value="4" class="mr-2" {{ request('rating') == '4' ? 'checked' : '' }}>
                    <label for="quatro_estrelas" class="text-gray-800">4 Estrelas</label>
                </div>
                <div class="mb-1">
                    <input type="radio" name="rating" id="tres_estrelas" value="3" class="mr-2" {{ request('rating') == '3' ? 'checked' : '' }}>
                    <label for="tres_estrelas" class="text-gray-800">3 Estrelas</label>
                </div>
                <div class="mb-1">
                    <input type="radio" name="rating" id="duas_estrelas" value="2" class="mr-2" {{ request('rating') == '2' ? 'checked' : '' }}>
                    <label for="duas_estrelas" class="text-gray-800">2 Estrelas</label>
                </div>
                <div class="mb-1">
                    <input type="radio" name="rating" id="uma_estrela" value="1" class="mr-2" {{ request('rating') == '1' ? 'checked' : '' }}>
                    <label for="uma_estrela" class="text-gray-800">1 Estrelas</label>
                </div>
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Aplicar Filtros</button>
        </form>
        </div>
                    <div class="w-3/4 flex flex-col items-center justify-center space-y-5">
                        @if($businesses->isEmpty())
                            <p>Nenhum negócio encontrado.</p>
                        @else
                            @foreach($businesses as $business)
                                <a href="{{ route('bussiness.info', $business->id) }}" class="w-full">
                                    <div class="flex flex-row p-4 space-x-5 bg-gray-100 rounded shadow-md">
                                        <div class="w-3/4 space-y-1">
                                            <h3 class="text-xl font-medium">{{ $business->businessName }}</h3>
                                            <p>Endereço: {{ $business->road }}, {{ $business->number }}, {{ $business->city }}, {{ $business->state }}</p>
                                            <p>Descrição: {{ $business->description }}</p>
                                        </div>
                                        <div class="w-1/4">
                                            <img src="{{ asset('storage/'.$business->locationPhoto) }}" alt="{{ $business->businessName }}" class="w-full h-full object-cover rounded shadow-md">
                                        </div>

                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>

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
        const priceRange = document.getElementById('price-range');
        const minValue = document.getElementById('min-value');
        const maxValue = document.getElementById('max-value');

        
        priceRange.addEventListener('input', function() {
            minValue.textContent = `R$0`;
            maxValue.textContent = `R$${this.value}+`;
        });
    </script>

     {{-- script para filtrar cidades --}}
    <script>
        const cities = ["Natal", "Mossoró", "Caicó", "Tibau do Sul", "Parnamirim", "Macau", "Pau dos Ferros", "Currais Novos", "Touros", "São Gonçalo do Amarante", "Santa Cruz", "Assú"];
        
        function autocompleteCity() {
        const input = document.getElementById("cityInput").value.toLowerCase();
        const suggestions = document.getElementById("citySuggestions");
        suggestions.innerHTML = "";
        if (input) {
            const filteredCities = cities.filter(city => city.toLowerCase().startsWith(input));
            filteredCities.forEach(city => {
            const suggestionItem = document.createElement("li");
            suggestionItem.textContent = city;
            suggestionItem.classList.add("p-2", "cursor-pointer", "hover:bg-gray-200");
            suggestionItem.onclick = function() {
                document.getElementById("cityInput").value = city;
                suggestions.classList.add("hidden");
            };
            suggestions.appendChild(suggestionItem);
            });
            suggestions.classList.remove("hidden");
        } else {
            suggestions.classList.add("hidden");
        }
        }

        document.addEventListener("click", function(event) {
        const suggestions = document.getElementById("citySuggestions");
        if (!suggestions.contains(event.target) && event.target.id !== "cityInput") {
            suggestions.classList.add("hidden");
        }
        });
    </script>
</body>
</html>