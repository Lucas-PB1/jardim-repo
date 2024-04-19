async function fetchImageUrls() {
    const slug = document.querySelector('#slug').value;
    await fetch(`/api/jardim/${slug}`)
        .then(response => response.json())
        .then(displayImages)
        .catch(error => console.error('Error fetching images:', error));
}

function displayImages(urls) {
    const gallery = document.getElementById('gallery');
    gallery.innerHTML = '';

    function loadBatch(batchIndex) {
        const startIndex = batchIndex * 10;
        const endIndex = startIndex + 10;
        const batchUrls = urls.slice(startIndex, Math.min(endIndex, urls.length));

        batchUrls.forEach((url, index) => {
            const isLastImage = index === batchUrls.length - 1;
            gallery.appendChild(createImageWrapper(url, isLastImage ? () => loadBatch(batchIndex + 1) : null));
        });
    }

    loadBatch(0);
}

function createImageWrapper(url, onLastImageVisible) {
    const wrapper = document.createElement('div');
    wrapper.classList.add('image-wrapper');

    const loadingOverlay = document.createElement('div');
    loadingOverlay.classList.add('loading-overlay');

    const spinner = document.createElement('div');
    spinner.classList.add('spinner');
    loadingOverlay.appendChild(spinner);

    wrapper.appendChild(loadingOverlay);

    const imgElement = createImageElement(url, loadingOverlay, () => {
        if (onLastImageVisible) onLastImageVisible();
    });

    wrapper.appendChild(imgElement);

    let name = url.replace('storage/photos/', '', url);
    name = name.replace('.webp', '', name);

    // const title = document.createElement('div');
    // title.innerHTML = name;
    // wrapper.append(title);

    return wrapper;
}

function createImageElement(url, loadingOverlay, onVisible) {
    const img = document.createElement('img');
    img.dataset.src = url;
    img.classList.add('photo');
    img.alt = 'Imagem da Galeria';

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                img.src = img.dataset.src;
                observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: '50px' });

    observer.observe(img);

    img.onload = () => {
        setTimeout(() => {
            if (loadingOverlay && loadingOverlay.parentNode) {
                loadingOverlay.parentNode.removeChild(loadingOverlay);
            }
        }, 200);
        if (onVisible) onVisible();
    };

    return img;
}

document.addEventListener("DOMContentLoaded", function () {
    fetchImageUrls();
});