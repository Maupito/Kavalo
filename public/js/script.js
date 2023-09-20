const searchInput = document.getElementById('searchInput');
    const filterMarque = document.getElementById('filtermarque');
    const filterKilometre = document.getElementById('filterkilometre');
    const filterCarburant = document.getElementById('filtercarburant');
    const slider = document.getElementById('slider');
    const sliderValue = document.getElementById('sliderValue');
    const cars = document.querySelectorAll('.car');
    const deleteButtons = document.querySelectorAll('.delete-button');
    const heartContainers = document.querySelectorAll('.heart-container');
    const compaContainers = document.querySelectorAll('.compa');
    let favorites = [];
    let comparateurPopup = document.getElementById('comparateurPopup');

    searchInput.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();

        cars.forEach(function (car) {
            const rowData = car.innerText.toLowerCase();

            if (rowData.includes(searchTerm)) {
                car.style.display = 'block';
            } else {
                car.style.display = 'none';
            }
        });
    });

    filterMarque.addEventListener('change', applyFilters);
    filterKilometre.addEventListener('change', applyFilters);
    filterCarburant.addEventListener('change', applyFilters);
    slider.addEventListener('input', applyFilters);
    slider.addEventListener('input', function () {
        sliderValue.textContent = this.value;
    });

    function applyFilters() {
        const selectedMarque = filterMarque.value;
        const selectedKilometre = filterKilometre.value;
        const selectedCarburant = filterCarburant.value;
        const selectedPrix = slider.value;

        cars.forEach(function (car) {
            const marque = car.getAttribute('data-marque');
            const kilometre = parseInt(car.getAttribute('data-kilometrage'));
            const carburant = car.getAttribute('data-carburant');
            const prix = parseInt(car.getAttribute('data-prix'));

            const marqueMatch = selectedMarque === '' || marque === selectedMarque;
            const kilometreMatch = selectedKilometre === '' ||
                (selectedKilometre === '0-50000' && kilometre >= 0 && kilometre <= 50000) ||
                (selectedKilometre === '50000-100000' && kilometre >= 50000 && kilometre <= 100000) ||
                (selectedKilometre === '100000+' && kilometre >= 100000);
            const carburantMatch = selectedCarburant === '' || carburant === selectedCarburant;
            const prixMatch = prix <= parseInt(selectedPrix);

            if (marqueMatch && kilometreMatch && carburantMatch && prixMatch) {
                car.style.display = 'block';
            } else {
                car.style.display = 'none';
            }
        });
    }

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const confirmation = confirm('Voulez-vous vraiment supprimer cette voiture ?');
            if (confirmation) {
                const form = this.parentElement;
                form.submit();
            }
        });
    });

    window.addEventListener('load', () => {
        favorites = JSON.parse(getCookie('favorites') || '[]');
        updateFavorites();
    });

    function updateFavorites() {
        heartContainers.forEach(container => {
            const carId = container.parentElement.getAttribute('data-id');
            const regularHeart = container.querySelector('.fa-regular');
            const solidHeart = container.querySelector('.fa-solid');
            const isFavorite = favorites.some(car => car.id === carId);

            if (isFavorite) {
                solidHeart.style.display = 'block';
                regularHeart.style.display = 'none';
            } else {
                solidHeart.style.display = 'none';
                regularHeart.style.display = 'block';
            }
        });

        setCookie('favorites', JSON.stringify(favorites), 30);
        updateFavoritesList();
    }

    function updateFavoritesList() {
        const favoritesList = document.getElementById('favoritesList');
        favoritesList.innerHTML = '';

        if (favorites.length === 0) {
            favoritesList.innerHTML = 'Aucun favoris';
        } else {
            const listItems = favorites.map(car => {
                return `
                    <div class="favorite-car">
                        <p>${car.marque} - ${car.modele}</p>
                        <a href="<?= base_url('voiture'); ?>${car.id}">
                            <button class="view-button">Voir plus</button>
                        </a>
                    </div>`;
            });

            favoritesList.innerHTML = listItems.join('');
        }
    }

    heartContainers.forEach(container => {
        const carId = container.parentElement.getAttribute('data-id');
        const regularHeart = container.querySelector('.fa-regular');
        const solidHeart = container.querySelector('.fa-solid');

        container.addEventListener('click', () => {
            const isFavorite = solidHeart.style.display === 'block';

            if (isFavorite) {
                solidHeart.style.display = 'none';
                regularHeart.style.display = 'block';

                favorites = favorites.filter(car => car.id !== carId);
            } else {
                solidHeart.style.display = 'block';
                regularHeart.style.display = 'none';

                const carData = {
                    id: carId,
                    marque: container.parentElement.getAttribute('data-marque'),
                    modele: container.parentElement.getAttribute('data-modele'),
                };
                favorites.push(carData);
            }

            updateFavorites();
        });
    });

    function handleCompaClick(container) {
        const carId = container.parentElement.getAttribute('data-id');
        const codeCompareIcon = container.querySelector('.fa-code-compare');
        const checkIcon = container.querySelector('.fa-check');

        const isCodeCompareVisible = codeCompareIcon.style.display === 'block';

        if (isCodeCompareVisible) {
            codeCompareIcon.style.display = 'none';
            checkIcon.style.display = 'block';
            const carData = {
                id: carId,
                marque: container.parentElement.getAttribute('data-marque'),
                modele: container.parentElement.getAttribute('data-modele'),
                kilometrage: container.parentElement.getAttribute('data-kilometrage'),
                carburant: container.parentElement.getAttribute('data-carburant'),
                prix: container.parentElement.getAttribute('data-prix'),
                puissance: container.parentElement.getAttribute('data-puissance'),
                couleur: container.parentElement.getAttribute('data-couleur'),
                annee: container.parentElement.getAttribute('data-annee'),
                transmission: container.parentElement.getAttribute('data-transmission'),
            };
            const comparateurList = document.getElementById('comparateurList');
            const selectedCars = comparateurList.querySelectorAll('.car');
            if (selectedCars.length >= 3) {
                alert('Vous pouvez sélectionner jusqu\'à trois voitures.');
            } else {
                addToComparateur(carData);
            }
        } else {
            codeCompareIcon.style.display = 'block';
            checkIcon.style.display = 'none';
            const carToRemove = document.querySelector(`#comparateurList [data-id="${carId}"]`);
            if (carToRemove) {
                carToRemove.remove();
            }
        }
    }

    compaContainers.forEach(container => {
        container.addEventListener('click', () => {
            handleCompaClick(container);
        });
    });

    function togglePopup() {
        const popup = document.getElementById('popupContent');
        if (popup.style.display === 'block') {
            popup.style.display = 'none';
        } else {
            popup.style.display = 'block';
        }
    }

    function toggleComparateur() {
        if (comparateurPopup.style.display === 'block') {
            comparateurPopup.style.display = 'none';
        } else {
            comparateurPopup.style.display = 'block';
        }
    }

    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    function getCookie(name) {
        const cookieName = name + "=";
        const cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            let cookie = cookies[i];
            while (cookie.charAt(0) === ' ') {
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(cookieName) === 0) {
                return cookie.substring(cookieName.length, cookie.length);
            }
        }
        return "";
    }

    function addToComparateur(carData) {
        const comparateurList = document.getElementById('comparateurList');
        const existingCar = comparateurList.querySelector(`[data-id="${carData.id}"]`);
        if (!existingCar) {
            const selectedCars = comparateurList.querySelectorAll('.car');
            if (selectedCars.length >= 3) {
                alert('Vous pouvez sélectionner jusqu\'à trois voitures dans le comparateur.');
                return;
            }

            const carElement = document.createElement('div');
            carElement.classList.add('car');
            carElement.setAttribute('data-id', carData.id);
            carElement.setAttribute('data-marque', carData.marque);
            carElement.setAttribute('data-modele', carData.modele);
            carElement.setAttribute('data-kilometrage', carData.kilometrage);
            carElement.setAttribute('data-carburant', carData.carburant);
            carElement.setAttribute('data-prix', carData.prix);
            carElement.setAttribute('data-puissance', carData.puissance); // Ajout de la puissance
            carElement.setAttribute('data-couleur', carData.couleur); // Ajout de la couleur
            carElement.setAttribute('data-annee', carData.annee); // Ajout de l'année
            carElement.setAttribute('data-transmission', carData.transmission); // Ajout de la transmission

            carElement.innerHTML = `
                <p>Marque: ${carData.marque}</p>
                <p>Modèle: ${carData.modele}</p>
                <p>Kilométrage: ${carData.kilometrage}</p>
                <p>Carburant: ${carData.carburant}</p>
                <p>Prix: ${carData.prix}</p>
                <p>Puissance: ${carData.puissance}</p> <!-- Ajout de la puissance -->
                <p>Couleur: ${carData.couleur}</p> <!-- Ajout de la couleur -->
                <p>Année: ${carData.annee}</p> <!-- Ajout de l'année -->
                <p>Transmission: ${carData.transmission}</p> <!-- Ajout de la transmission -->
                <p><a href="<?= base_url('voiture'); ?>${carData.id}"><button class="view-button">Voir plus</button></a></p>
            `;

            comparateurList.appendChild(carElement);
        }
    }