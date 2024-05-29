document.addEventListener("DOMContentLoaded", function() {

    class Gallery {
        constructor(containerId, images) {
            this.container = document.getElementById(containerId);
            this.images = images;
        }

        createGalleryItem(image) {
            const galleryItem = document.createElement('div');
            galleryItem.classList.add('gallery-item');

            const img = document.createElement('img');
            img.src = image.src;
            img.alt = image.alt;

            galleryItem.appendChild(img);
            return galleryItem;
        }

        render() {
            this.images.forEach(image => {
                const galleryItem = this.createGalleryItem(image);
                this.container.appendChild(galleryItem);
            });
        }
    }

    const images = [
        { src: '../img/azada_jardineria.png', alt: 'Imagen 1' },
        { src: '../img/pala_jardineria.png', alt: 'Imagen 2' },
        { src: '../img/cortasetos.png', alt: 'Imagen 3' },
        { src: '../img/cuchillo_jardineria.png', alt: 'Imagen 4' },
        { src: '../img/despuntadora.png', alt: 'Imagen 5' },
        { src: '../img/guadaña_jardineria.png', alt: 'Imagen 6' },
        { src: '../img/hacha_jardineria.png', alt: 'Imagen 7' },
        { src: '../img/cortasetos.png', alt: 'Imagen 8' }
    ];

    const gallery = new Gallery('gallery', images);
    gallery.render();
});
