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
    const modalDescription = document.getElementById("modal-description");
    const modalTags = document.getElementById("modal-tags");
    const modalImagesContainer = document.getElementById("modal-images-container");

    let currentIndex = 0;
    let images = [];

    document.querySelectorAll(".view-details-btn").forEach(button => {
        button.addEventListener("click", () => {
            modalTitle.textContent = button.dataset.nama;
            modalLocation.textContent = button.dataset.lokasi;
            modalPrice.textContent = "Rp. " + button.dataset.harga;
            modalDescription.textContent = button.dataset.deskripsi;

            // Tambahkan tags
            modalTags.innerHTML = "";
            const tags = JSON.parse(button.dataset.tags);
            tags.forEach(tag => {
                const span = document.createElement("span");
                span.className = "inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-300 text-gray-800";
                span.textContent = tag.nama;
                modalTags.appendChild(span);
            });

            // Load gambar
            images = JSON.parse(button.dataset.gambar);
            modalImagesContainer.innerHTML = "";
            images.forEach((img, index) => {
                const imgEl = document.createElement("img");
                imgEl.src = `/storage/${img}`;
                imgEl.className = "w-full h-80 object-cover flex-shrink-0";
                modalImagesContainer.appendChild(imgEl);
            });

            currentIndex = 0;
            updateSlider();

            modal.classList.remove("hidden");
        });
    });

    // Tombol tutup
    document.getElementById("modal-close").addEventListener("click", () => {
        modal.classList.add("hidden");
    });

    // Tombol navigasi
    document.getElementById("prev-btn").addEventListener("click", () => {
        if (currentIndex > 0) currentIndex--;
        else currentIndex = images.length - 1;
        updateSlider();
    });

    document.getElementById("next-btn").addEventListener("click", () => {
        if (currentIndex < images.length - 1) currentIndex++;
        else currentIndex = 0;
        updateSlider();
    });

    function updateSlider() {
        const offset = -currentIndex * 100;
        modalImagesContainer.style.transform = `translateX(${offset}%)`;
    }
});


        