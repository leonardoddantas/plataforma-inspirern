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
  <header class="relativa h-[90vh] bg-cover bg-center" style="background-image: url('{{ asset('storage/img/brackground-image-header-beach.jpg') }}');">
    <div class="absolute w-full h-[90vh] bg-black opacity-65"></div>
    <div class="relative z-10 container mx-auto px-4 h-full">
      <nav class="flex flex-row items-center justify-between h-20 text-xl text-slate-50">
        <a href="http://">Logo</a>
        <ul class="flex flex-row items-center justify-center space-x-4">
          <li class="hover:text-blue-950 transition"><a href="http://">Home</a></li>
          <li class="hover:text-blue-950 hover:font-semibold transition"><a href="http://">Restaurantes</a></li>
          <li class="hover:text-blue-950 hover:font-semibold transition"><a href="http://">Pontos Turistícos</a></li>
          <li class="hover:text-blue-950 hover:font-semibold transition"><a href="http://">Hospedagens</a></li>
          <li class="hover:text-blue-950 hover:font-semibold transition"><a href="http://">Cidades</a></li>
          @if (Auth::check())
            <li class="hover:text-blue-950 hover:font-semibold transition"><a href="{{route('profile.edit')}}">Painel de Controle</a></li>
          @else
            <li class="hover:text-blue-950 hover:font-semibold transition"><a href="{{route('login')}}">Login</a></li>
          @endif
        </ul>
      </nav>

      <div class="mt-40 text-slate-50">
        <h1 class="text-6xl font-medium mb-4 tracking-wide">Conheça o Paraíso Potiguar!</h1>
        <p class="text-lg mb-8 tracking-normal">Explore as maravilhas do Rio Grande do Norte! Mergulhe em cultura, aventura e paisagens incríveis.</p>

        <form action="{{ route('search') }}" method="GET" class="flex flex-row p-8 bg-blue-950 rounded z-20 text-lg text-slate-950 space-x-4 shadow-lg relative">
          @csrf
          <input id="businessName" name="businessName" type="text" placeholder="Nome de um negócio" class="w-2/5 p-2 rounded flex-grow shadow-sm">

          <select id="category" name="category" placeholder="Categoria" class="w-1/5 p-2 rounded flex-grow shadow-sm">
            <option value="">Selecione uma categoria</option>
            <option value="restaurante">Restaurantes</option>
            <option value="hospedagem">Hospedagens</option>
            <option value="ponto_turistico">Ponto Turístico</option>
          </select>

          <div class="relative w-1/5">
            <input name="city" type="text" id="cityInput" class="w-full p-2 rounded shadow-sm" placeholder="Digite a cidade" onkeyup="autocompleteCity()">
            
            <ul id="citySuggestions" class="absolute w-full bg-white shadow-lg rounded mt-1 max-h-48 overflow-y-auto hidden z-50 text-black"></ul>
          </div>

          <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded flex-grow shadow-md hover:bg-blue-800 hover:shadow-lg transform hover:scale-105 transition">Pesquisar</button>
        </form>
      </div>
    </div>
  </header>

  {{-- Main --}}
  <main class="pt-28 bg-gray-50">
    <div class="relative z-10 container mx-auto px-4 h-full">

      {{-- Lugares Populares --}}
      <section class="mb-28">
        <h2 class="mb-2 text-4xl text-center font-normal tracking-wide">Lugares Populares</h2>
        <p class="mb-10 text-center">Confira os destinos mais bem avaliados!</p>

        <div class="flex flex-row items-center justify-between">
          <span class="cursor-pointer py-1 px-2 text-lg rounded shadow-sm hover:bg-blue-900 hover:text-white hover:shadow-lg transform hover:scale-105 transition"><</span>
          <img src="{{asset('storage/img/lugares-populares-1.jpg')}}" alt="Imagem de duas pessoas tomando banhos em uma praia." class="w-72 h-96 object-cover rounded shadow-lg">
          <img src="{{asset('storage/img/lugares-populares-2.jpg')}}" alt="Imagem de uma praia com um rocha no fundo." class="w-72 h-96 object-cover rounded shadow-lg">
          <img src="{{asset('storage/img/lugares-populares-5.jpg')}}" alt="Imagem do morro do careca em Natl-RN." class="w-72 h-96 object-cover rounded shadow-lg">
          <img src="{{asset('storage/img/lugares-populares-6.jpg')}}" alt="Imagens de placas e o mar de fundo." class="w-72 h-96 object-cover rounded shadow-lg">
          <span class="cursor-pointer py-1 px-2 text-lg rounded shadow-sm hover:bg-blue-900 hover:text-white hover:shadow-lg transform hover:scale-105 transition">></span>
        </div>
      </section>

      <!-- Onde Nós Vamos -->
      <section class="py-16 mb-28 bg-gray-100-100 rounded shadow-md">
      <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-8">Onde Nós Vamos</h2>

        <p class="text-lg leading-relaxed mb-12 max-w-3xl mx-auto text-gray-700">
          O Rio Grande do Norte é um estado único, conhecido por sua diversidade natural, cultural e gastronômica. 
          Este site reúne o melhor que o estado tem a oferecer: desde suas praias e dunas até as tradições culturais 
          e a hospitalidade do povo. Aqui, você encontrará dicas, roteiros e recomendações para viver uma experiência 
          completa no RN. Nosso objetivo é mostrar o que o Rio Grande do Norte tem de mais especial, tanto para turistas quanto para os próprios potiguares.
        </p>

        <div class="flex flex-wrap justify-center gap-8">
          <div class="w-80 p-4 bg-gray-200 rounded-lg shadow-md">
            <img src="{{asset('storage/img/map_setion_where_are_we_go.png')}}" alt="Mapa do Rio Grande do Norte" class="w-full h-48 object-cover rounded-md mb-4">
            <p class="text-md text-gray-600">Conheça o Rio Grande do Norte, um lugar de riquezas naturais e culturais.</p>
          </div>

          <div class="w-80 p-4 bg-gray-200 rounded-lg shadow-md">
            <img src="{{asset('storage/img/cultura.jpg')}}" alt="Cultura do RN" class="w-full h-48 object-cover rounded-md mb-4">
            <p class="text-md text-gray-600">Descubra as tradições, festas e a vibrante cultura potiguar.</p>
          </div>

          <div class="w-80 p-4 bg-gray-200 rounded-lg shadow-md">
            <img src="{{asset('storage/img/gastronomia.jpg')}}" alt="Gastronomia do RN" class="w-full h-48 object-cover rounded-md mb-4">
            <p class="text-md text-gray-600">Explore a gastronomia local, repleta de sabores autênticos e únicos.</p>
          </div>
        </div>
      </div>
      </section>

      {{-- Veja o que as pessoas tão falando --}}
      <section class="mb-28 rounded">
        <h2 class="mb-10 text-4xl text-center font-normal tracking-wide">Veja o que as pessoas tão falando</h2>

        <div class="flex flex-row space-x-8 h-[80vh]">
          <div class="w-1/2">
            <img src="{{asset('storage/img/person-setion-comentars.webp')}}" alt="Imagem de uma mulher" class="w-full h-full object-cover rounded">
          </div>

          <div class="flex flex-col justify-between w-1/2 p-10 bg-gray-100 rounded shadow-lg">

            <div class="flex flex-col items-center justify-center flex-grow">
              <p>24.05.2024</p>
              <h3 class="mb-14 text-3xl font-medium tracking-wide">Bruna Silva</h3>
              <span class="w-3/4 h-[0.099rem] mb-14 rounded bg-zinc-950"></span>
              <p class="w-3/4 text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate possimus nulla ducimus culpa magni expedita.</p>
            </div>
            
            <div class="flex flex-row items-center justify-center space-x-2">
              <span class="py-1 px-2 text-lg rounded shadow-lg cursor-pointer hover:bg-blue-900 hover:text-white hover:shadow-lg transform hover:scale-105 transition"><</span>
              <p>1/7</p>
              <span class="py-1 px-2 text-lg rounded shadow-lg cursor-pointer hover:bg-blue-900 hover:text-white hover:shadow-lg transform hover:scale-105 transition">></span>
            </div>

          </div>
        </div>
      </section>


      {{-- Anuncie no INSPIRERN --}}
      <section class="h-auto p-10 mb-28 bg-gray-100 rounded shadow-lg">
        <h2 class="mb-6 text-3xl font-normal tracking-wide">Anuncie no INSPIRERN</h2>
        <p class="mb-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate possimus nulla ducimus culpa magni expedita, unde velit optio quibusdam qui quis rem voluptas, numquam labore adipisci ipsa dolorem atque eos. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate possimus nulla ducimus culpa magni expedita, unde velit optio quibusdam qui quis rem voluptas, numquam labore adipisci ipsa dolorem atque eos.</p>

        <div class="flex flex-wrap gap-4">
          <a href="{{route('business.create')}}" class="flex-1 p-5 text-center text-lg rounded bg-gray-200 shadow-lg hover:bg-blue-900 hover:text-white hover:shadow-lg transform hover:scale-105 transition">Restaurante</a>
          <a href="{{route('business.create')}}"  class="flex-1 p-5 text-center text-lg rounded bg-gray-200 shadow-lg hover:bg-blue-900 hover:text-white hover:shadow-lg transform hover:scale-105 transition">Hospedagem</a>
          <a href="{{route('business.create')}}"  class="flex-1 p-5 text-center text-lg rounded bg-gray-200 shadow-lg hover:bg-blue-900 hover:text-white hover:shadow-lg transform hover:scale-105 transition">Ponto Turístico</a>
          <a href="{{route('business.create')}}"  class="flex-1 p-5 text-center text-lg rounded bg-gray-200 shadow-lg hover:bg-blue-900 hover:text-white hover:shadow-lg transform hover:scale-105 transition">Passeio</a>
        </div>
      </section>

      {{-- Galeria --}}
      <section class="mb-28">
        <h2 class="mb-10 text-4xl text-center font-normal tracking-wide">Galeria</h2>

        <div class="h-screen grid grid-cols-3 grid-rows-3 gap-4">
        
          <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" alt="Imagem de duas pessoas tomando banho em uma praia." class="w-full h-full object-cover rounded shadow-lg row-start-1 row-end-2">

          <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" alt="Imagem de uma praia com uma rocha no fundo." class="w-full h-full object-cover rounded shadow-lg row-start-1 row-end-2">

          <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" alt="Imagem do morro do careca em Natal-RN." class="w-full h-full object-cover rounded shadow-lg row-start-1 row-end-2">

          <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" alt="Imagens de placas e o mar de fundo." class="w-full h-full object-cover rounded shadow-lg row-start-2 row-end-3">

          <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" alt="Imagens de placas e o mar de fundo." class="w-full h-full object-cover rounded shadow-lg row-start-2 row-end-3">

          <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" alt="Imagens de placas e o mar de fundo." class="w-full h-full object-cover rounded shadow-lg row-start-2 row-end-4">

          <img src="{{asset('storage/img/brackground-image-header-beach.jpg')}}" alt="Imagens de placas e o mar de fundo." class="w-full h-full object-cover rounded shadow-lg row-start-3 row-end-4 col-start-1 col-end-3">
        </div>
      </section>
      
      <!-- Seção de Histórias de Viagens e Testemunhos -->
      <section id="testimonials" class="mb-28 py-16 bg-gray-100 rounded shadow-md">
          <div class="container mx-auto px-6">
              <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Histórias de Viagens e Testemunhos</h2>

              <div class="relative">
                  <div class="testimonial-carousel flex overflow-hidden relative">
                      <div class="testimonial-slide flex items-center justify-center w-full px-4">
                          <div class="max-w-sm bg-white shadow-lg rounded-lg p-4 text-center">
                              <img src="{{asset('storage/img/person.webp')}}" alt="Usuário 1" class="w-20 h-20 object-cover rounded-full mx-auto mb-4 border-4 border-indigo-500">
                              <p class="text-lg italic mb-4">"Minha viagem ao Rio Grande do Norte foi absolutamente inesquecível! Cada momento foi mágico."</p>
                              <h3 class="text-xl font-semibold">Nome do Usuário</h3>
                          </div>
                      </div>

                      <div class="testimonial-slide flex items-center justify-center w-full px-4 hidden">
                          <div class="max-w-sm bg-white shadow-lg rounded-lg p-4 text-center">
                              <img src="{{asset('storage/img/person.webp')}}" alt="Usuário 2" class="w-20 h-20 object-cover rounded-full mx-auto mb-4 border-4 border-indigo-500">
                              <p class="text-lg italic mb-4">"Explorar as praias e conhecer a cultura local foi uma experiência única. Voltarei com certeza!"</p>
                              <h3 class="text-xl font-semibold">Nome do Usuário 2</h3>
                          </div>
                      </div>

                      <div class="testimonial-slide flex items-center justify-center w-full px-4 hidden">
                          <div class="max-w-sm bg-white shadow-lg rounded-lg p-4 text-center">
                              <img src="{{asset('storage/img/person.webp')}}" alt="Usuário 3" class="w-20 h-20 object-cover rounded-full mx-auto mb-4 border-4 border-indigo-500">
                              <p class="text-lg italic mb-4">"Paisagens deslumbrantes e ótimos serviços. Não vejo a hora de planejar minha próxima viagem!"</p>
                              <h3 class="text-xl font-semibold">Nome do Usuário 3</h3>
                          </div>
                      </div>
                  </div>

                  <button class="prev absolute top-1/2 left-0 transform -translate-y-1/2 rounded shadow-md hover:bg-blue-900 hover:text-white p-3 opacity-75 hover:opacity-100">
                    <
                  </button>
                  <button class="next absolute top-1/2 right-0 transform -translate-y-1/2 rounded shadow-md hover:bg-blue-900 hover:text-white p-3 opacity-75 hover:opacity-100">
                    >
                  </button>
              </div>
          </div>
      </section>  

      <!-- Perguntas Frequentes -->
      <section class="pb-28">
        <h2 class="text-4xl text-center font-normal tracking-wide mb-10">Perguntas Frequentes</h2>

        <div class="w-3/4 mx-auto">
          <!-- Pergunta 1 -->
          <div class="mb-4 border-b border-gray-300 pb-4">
            <h3 class="text-xl font-semibold cursor-pointer" onclick="toggleAnswer(1)">
              O que é a plataforma?
              <span id="icon-1" class="float-right">+</span>
            </h3>
            <p id="answer-1" class="hidden mt-2 text-gray-700">
              A nossa plataforma é dedicada à divulgação de pontos turísticos, hospedagens e restaurantes do Rio Grande do Norte, ajudando turistas a explorar as maravilhas locais.
            </p>
          </div>

          <!-- Pergunta 2 -->
          <div class="mb-4 border-b border-gray-300 pb-4">
            <h3 class="text-xl font-semibold cursor-pointer" onclick="toggleAnswer(2)">
              Como posso cadastrar meu negócio?
              <span id="icon-2" class="float-right">+</span>
            </h3>
            <p id="answer-2" class="hidden mt-2 text-gray-700">
              Para cadastrar seu negócio, basta acessar a seção "Cadastro" em nosso site e preencher as informações necessárias. Após a revisão, seu negócio será publicado na plataforma.
            </p>
          </div>

          <!-- Pergunta 3 -->
          <div class="mb-4 border-b border-gray-300 pb-4">
            <h3 class="text-xl font-semibold cursor-pointer" onclick="toggleAnswer(3)">
              É possível criar um roteiro personalizado?
              <span id="icon-3" class="float-right">+</span>
            </h3>
            <p id="answer-3" class="hidden mt-2 text-gray-700">
              Sim, você pode criar seu próprio roteiro personalizado adicionando os locais de interesse diretamente na plataforma, e nós ajudamos você a organizar sua viagem!
            </p>
          </div>

          <!-- Pergunta 4 -->
          <div class="mb-4 border-b border-gray-300 pb-4">
            <h3 class="text-xl font-semibold cursor-pointer" onclick="toggleAnswer(4)">
              Quais tipos de hospedagens posso encontrar?
              <span id="icon-4" class="float-right">+</span>
            </h3>
            <p id="answer-4" class="hidden mt-2 text-gray-700">
              Você pode encontrar uma variedade de hospedagens, como casas, apartamentos, hotéis e pousadas, com filtros de preço e avaliação para facilitar sua escolha.
            </p>
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

  <!-- Script para alternar respostas -->
  <script>
    function toggleAnswer(id) {
      var answer = document.getElementById('answer-' + id);
      var icon = document.getElementById('icon-' + id);
      
      if (answer.classList.contains('hidden')) {
        answer.classList.remove('hidden');
        icon.innerText = '-';
      } else {
        answer.classList.add('hidden');
        icon.innerText = '+';
      }
    }

    let currentSlideIndex = 0;
    const slides = document.querySelectorAll('.testimonial-slide');
    const totalSlides = slides.length;

    document.querySelector('.next').addEventListener('click', () => {
        slides[currentSlideIndex].classList.add('hidden');
        currentSlideIndex = (currentSlideIndex + 1) % totalSlides;
        slides[currentSlideIndex].classList.remove('hidden');
    });

    document.querySelector('.prev').addEventListener('click', () => {
        slides[currentSlideIndex].classList.add('hidden');
        currentSlideIndex = (currentSlideIndex - 1 + totalSlides) % totalSlides;
        slides[currentSlideIndex].classList.remove('hidden');
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