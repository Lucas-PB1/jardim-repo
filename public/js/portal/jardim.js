async function fetchImageUrls() {
    const images = await myFetch(`/api/jardim/${slug.value}`);
    displayImages(images);
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
    const wrapper = create_element({ tag: 'div', classes: 'col-md-2 shadow-sm p-2 position-relative' });
    const spinner = create_element({ tag: 'div', classes: 'image-spinner' });
    const imgElement = createImageElement(url, spinner, () => onLastImageVisible ? onLastImageVisible() : '');

    wrapper.appendChild(spinner);
    wrapper.appendChild(imgElement);

    let name = url.replace('storage/photos/', '').replace('.webp', '');
    
    return wrapper;
}

function createImageElement(url, spinner, onVisible) {
    const img = create_element({ tag: 'img', classes: 'w-100 object-cover expand-scale', params: [{ key: 'alt', value: 'Imagem da Galeria' }] });
    img.dataset.src = url;

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                spinner.style.display = 'block';
                img.src = img.dataset.src;
                observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: '50px' });

    observer.observe(img);
    img.onload = () => {
        spinner.style.display = 'none'; 
        if(onVisible) onVisible();
    };

    return img;
}
document.addEventListener("DOMContentLoaded", () => fetchImageUrls());