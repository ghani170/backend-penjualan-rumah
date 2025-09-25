        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Services dropdown toggle
        const servicesDropdownButton = document.getElementById('services-dropdown-button');
        const servicesDropdown = document.getElementById('services-dropdown');
        
        servicesDropdownButton.addEventListener('click', () => {
            servicesDropdown.classList.toggle('hidden');
            const icon = servicesDropdownButton.querySelector('i');
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
        });
         // Gear dropdown toggle
        const gearDropdownButton = document.getElementById('gear-dropdown-button');
        const gearDropdown = document.getElementById('gear-dropdown');
        
        gearDropdownButton.addEventListener('click', (e) => {
            e.stopPropagation();
            gearDropdown.classList.toggle('hidden');
        });

         // Dark mode functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Dark mode toggle elements
            const darkModeToggle = document.getElementById('dark-mode-toggle');
            const mobileDarkModeToggle = document.getElementById('mobile-dark-mode-toggle');
            const darkModeText = document.getElementById('dark-mode-text');
            const mobileDarkModeText = document.getElementById('mobile-dark-mode-text');
            const html = document.documentElement;
            
            // Check for saved user preference or use system preference
            const savedMode = localStorage.getItem('darkMode') || 
                            (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            
            // Apply the saved mode
            if (savedMode === 'dark') {
                html.classList.add('dark');
                updateDarkModeText(true);
            } else {
                html.classList.remove('dark');
                updateDarkModeText(false);
            }
            
            // Toggle dark mode
            function toggleDarkMode() {
                html.classList.toggle('dark');
                const isDark = html.classList.contains('dark');
                localStorage.setItem('darkMode', isDark ? 'dark' : 'light');
                updateDarkModeText(isDark);
            }
            
            // Update dark mode text and icon
            function updateDarkModeText(isDark) {
                const text = isDark ? 'Light Mode' : 'Dark Mode';
                const icon = isDark ? 'fa-sun' : 'fa-moon';
                
                if (darkModeText) darkModeText.textContent = text;
                if (mobileDarkModeText) mobileDarkModeText.textContent = text;
                
                // Update icons
                const icons = document.querySelectorAll('#dark-mode-toggle i, #mobile-dark-mode-toggle i');
                icons.forEach(iconEl => {
                    iconEl.classList.remove('fa-moon', 'fa-sun');
                    iconEl.classList.add(isDark ? 'fa-sun' : 'fa-moon');
                });
            }
            
            // Event listeners
            if (darkModeToggle) darkModeToggle.addEventListener('click', toggleDarkMode);
            if (mobileDarkModeToggle) mobileDarkModeToggle.addEventListener('click', toggleDarkMode);
            
            // Listen for system color scheme changes
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                if (!localStorage.getItem('darkMode')) {
                    if (e.matches) {
                        html.classList.add('dark');
                        updateDarkModeText(true);
                    } else {
                        html.classList.remove('dark');
                        updateDarkModeText(false);
                    }
                }
            });

            
        });

        document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("product-modal");
    const modalTitle = document.getElementById("modal-title");
    const modalLocation = document.getElementById("modal-location");
    const modalPrice = document.getElementById("modal-price");
    const modalluasbangunan = document.getElementById("modal-luasbangunan");
    const modalluastanah = document.getElementById("modal-luastanah");
    const modallistrik = document.getElementById("modal-listrik");
    const modalsertifikat = document.getElementById("modal-sertifikat");
    const modalDescription = document.getElementById("modal-description");
    const modalImagesContainer = document.getElementById("modal-images-container");
    const thumbnailContainer = document.getElementById("thumbnail-container");
    const indicatorsContainer = document.getElementById("image-indicators");

    let currentIndex = 0;
    let images = [];

    // Buka modal
    document.querySelectorAll(".view-details-btn").forEach(button => {
        button.addEventListener("click", () => {
            modalTitle.textContent = button.dataset.nama;
            modalLocation.textContent = button.dataset.lokasi;
            modalPrice.textContent = "Rp. " + button.dataset.harga;
            modalluasbangunan.textContent = button.dataset.luas_bangunan + " m²";
            modalluastanah.textContent = button.dataset.luas_tanah + " m²";
            modallistrik.textContent = button.dataset.listrik + " Watt";
            modalsertifikat.textContent = button.dataset.sertifikat;
            modalDescription.textContent = button.dataset.deskripsi;

            // Load gambar
            images = JSON.parse(button.dataset.gambar);
            loadImages(images);

            // Load thumbnail
            thumbnailContainer.innerHTML = "";
            images.forEach((img, index) => {
                const thumb = document.createElement("img");
                thumb.src = `/storage/${img}`;
                thumb.className = "w-16 h-12 object-cover rounded-md border-2 border-transparent cursor-pointer transition duration-300";
                thumb.addEventListener("click", () => {
                    currentIndex = index;
                    updateSlider();
                });
                thumbnailContainer.appendChild(thumb);
            });

            // Load indicator (dot)
            indicatorsContainer.innerHTML = "";
            images.forEach((_, index) => {
                const dot = document.createElement("div");
                dot.className = "w-3 h-3 rounded-full bg-gray-300 cursor-pointer transition duration-300";
                dot.addEventListener("click", () => {
                    currentIndex = index;
                    updateSlider();
                });
                indicatorsContainer.appendChild(dot);
            });

            // WhatsApp Button
            const nomor = "62895640327767";
            const gambarPertama = images.length > 0 ? `/storage/${images[0]}` : '';
            const pesan = `Hallo, saya ingin bertanya tentang rumah: ${button.dataset.nama}.\nLokasi: ${button.dataset.lokasi}.\nHarga: ${button.dataset.harga}`;
            document.getElementById('waButton').href = `https://wa.me/${nomor}?text=${encodeURIComponent(pesan)}`;

            currentIndex = 0;
            updateSlider();
            modal.classList.remove("hidden");
        });
    });

    // Tutup modal
    document.getElementById("modal-close").addEventListener("click", () => {
        modal.classList.add("hidden");
    });

    // Tombol navigasi
    document.getElementById("prev-btn").addEventListener("click", () => {
        if (images.length === 0) return;
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateSlider();
    });

    document.getElementById("next-btn").addEventListener("click", () => {
        if (images.length === 0) return;
        currentIndex = (currentIndex + 1) % images.length;
        updateSlider();
    });

    // Fungsi load images
    function loadImages(images) {
        modalImagesContainer.innerHTML = `
            <div id="slider-inner" class="flex transition-transform duration-500 ease-in-out" style="width:${images.length * 100}%">
                ${images.map(img => `
                    <img src="/storage/${img}" class="w-full h-80 object-cover flex-shrink-0" />
                `).join("")}
            </div>
        `;
    }

    // Update slider
    function updateSlider() {
        const sliderInner = document.getElementById("slider-inner");
        if (!sliderInner) return;

        const offset = -currentIndex * 100;
        sliderInner.style.transform = `translateX(${offset}%)`;

        // Highlight thumbnail
        document.querySelectorAll("#thumbnail-container img").forEach((thumb, idx) => {
            thumb.classList.toggle("border-blue-500", idx === currentIndex);
        });

        // Highlight indicator
        document.querySelectorAll("#image-indicators div").forEach((dot, idx) => {
            dot.classList.toggle("bg-blue-500", idx === currentIndex);
            dot.classList.toggle("bg-gray-300", idx !== currentIndex);
        });
    }
});



        