<x-guest-layout>
    <!-- Main Hero Content -->
<div class="relative w-full h-screen bg-center bg-cover" 
    style="background-image: url('{{ asset('storage/assets/background.png') }}')">

    <!-- Dark overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>

    <!-- Content -->
    <div class="relative z-10 flex flex-col items-center justify-center h-full px-4 text-center text-white">
        <h1 class="font-serif text-4xl font-extrabold drop-shadow-lg md:text-6xl">
            Welcome to Gusteau’s Restaurant
        </h1>

        <p class="max-w-2xl mt-4 text-lg md:text-xl drop-shadow">
            Home of the finest French cuisine, where passion meets perfection and every dish tells the story 
            of Chef Auguste Gusteau’s timeless artistry.
        </p>

        <p class="mt-4 italic text-md md:text-lg drop-shadow">
            “Anyone can cook, but only the fearless can be great.” – Chef Auguste Gusteau
        </p>

        <a href="{{ route('reservations.step.one') }}"
            class="px-8 py-3 mt-10 text-lg font-semibold text-black bg-white rounded-full shadow-lg hover:bg-gray-200">
            Make Reservation
        </a>
    </div>
</div>

    <!-- End Main Hero Content -->
    <section class="px-6 py-24 bg-[#FFF7E8] md:px-0">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
            <div class="flex flex-wrap items-center sm:-mx-3">
                
                <!-- LEFT CONTENT -->
                <div class="w-full md:w-1/2 md:px-3">
                    <div class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg lg:pr-0 md:pb-0">
                        
                        <h1 class="text-5xl font-bold text-gray-900">Our Story</h1>
    
                        <p class="mx-auto text-base leading-relaxed text-gray-700 sm:max-w-md lg:text-lg md:max-w-3xl">
                            Founded in the heart of Paris by the visionary Chef Auguste Gusteau, Gusteau’s Restaurant  
                            was born from the belief that “anyone can cook.” What began as a humble kitchen soon  
                            blossomed into a world-renowned dining destination celebrated for its artistry, innovation,  
                            and devotion to French culinary tradition.
                        </p>
    
                        <p class="mx-auto text-base leading-relaxed text-gray-700 sm:max-w-md lg:text-lg md:max-w-3xl">
                            Though Chef Gusteau’s presence now lingers as a legend, his spirit continues to guide every  
                            creation that leaves the kitchen. Today, Gusteau’s stands as a five-star symbol of French  
                            excellence, where timeless recipes meet modern elegance.
                        </p>
    
                    </div>
                </div>
    
                <!-- RIGHT IMAGE -->
                <div class="w-full md:w-1/2">
                    <div class="w-full overflow-hidden rounded-xl shadow-xl">
                        <img src="/storage/assets/story.png" class="object-cover w-full h-full" />
                    </div>
                </div>
    
            </div>
        </div>
    </section>
    
    
    <section class="py-20 bg-[#3a3a3a]">
        <div class="text-center mb-16">
            <h2 class="text-5xl font-serif text-white">Testimonial</h2>
            <p class="text-lg text-gray-200 mt-2">
                Hear what they have to say about our restaurant
            </p>
        </div>
    
        <div class="grid gap-16 lg:grid-cols-3 place-items-center">
            
            <!-- Card 1 -->
            <div class="relative bg-white rounded-xl shadow-lg p-8 w-[350px]">
                <img src="{{ asset('storage/assets/Gordon_Ramsay.jpg') }}" 
                    class="w-24 h-24 rounded-full object-cover border-4 border-white absolute -top-12 left-1/2 transform -translate-x-1/2" />
    
                <h3 class="text-xl italic font-serif text-gray-800 mt-12">Fanf****ingtastic</h3>
                <p class="text-gray-700 mt-2 text-sm leading-relaxed">
                   This restaurant delivers a fantastic dining experience from start to finish. 
                   The atmosphere is vibrant and well thought out, striking a perfect balance between comfort and sophistication. 
                   The staff are sharp, attentive, and clearly well-trained, making the entire experience smooth and enjoyable.
                </p>
    
                <p class="text-right mt-4 italic font-serif text-gray-900">Gordon Ramsay</p>
            </div>
    
            <!-- Card 2 -->
            <div class="relative bg-white rounded-xl shadow-lg p-8 w-[350px]">
                <img src="{{ asset('storage/assets/ego.png') }}" 
                    class="w-24 h-24 rounded-full object-cover border-4 border-white absolute -top-12 left-1/2 transform -translate-x-1/2" />
    
                <h3 class="text-xl italic font-serif text-gray-800 mt-12">It's Amazing</h3>
                <p class="text-gray-700 mt-2 text-sm leading-relaxed">
                    At first I was a little skeptical about the food, but it turns out to be the
                    best food I've ever ate in my life, it brings me back to my childhood,
                    10/10 would eat here again.
                </p>
    
                <p class="text-right mt-4 italic font-serif text-gray-900">Anton Ego</p>
            </div>
    
            <!-- Card 3 -->
            <div class="relative bg-white rounded-xl shadow-lg p-8 w-[350px]">
                <img src="{{ asset('storage/assets/chef_juna.jpg') }}" 
                    class="w-24 h-24 rounded-full object-cover border-4 border-white absolute -top-12 left-1/2 transform -translate-x-1/2" />
    
                <h3 class="text-xl italic font-serif text-gray-800 mt-12">Mantap</h3>
                <p class="text-gray-700 mt-2 text-sm leading-relaxed">
                    Saya datang ke restoran ini dengan ekspektasi tinggi, dan secara umum pengalamannya cukup memuaskan. Dari segi kebersihan dan kerapian dapur, terlihat 
                    jelas bahwa tim dapur bekerja dengan standar yang baik, ini poin penting yang sering diabaikan tapi sebenarnya sangat krusial.
                </p>
    
                <p class="text-right mt-4 italic font-serif text-gray-900">Juna Rorimpandey</p>
            </div>
    
        </div>
    </section>
    
</x-guest-layout>