         // JavaScript untuk hamburger menu
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