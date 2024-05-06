let paramsGalery = [];

if (document.querySelector("#dropzone")) new Dropzone("#dropzone", optionsDropzone);

async function chargeGalery(table, id) {
    paramsGalery = [table, id];
    document.querySelector('#galeria').innerHTML = '';

    const data = await myFetch(`/cms/galeria/${table}/${id}`);

    if (data && data.length > 0) {
        data.forEach(dados => {
            const galleryCol = create_element({ tag: 'div', classes: 'col-sm-4 col-lg-3 mt-2' });
            const galleryCard = create_element({ tag: 'div', classes: 'gallery card card-bordered' });

            const galleryImageLink = create_element({
                tag: 'a',
                classes: 'gallery-image popup-image',
                estilos: 'height: 200px; display: block;'
            });

            const galleryImage = create_element({
                tag: 'img',
                classes: 'w-100 rounded-top',
                src: dados.path,
                estilos: 'object-fit: cover; height: 100%;'
            });

            galleryImageLink.appendChild(galleryImage);
            galleryCard.appendChild(galleryImageLink);

            const galleryBody = create_element({ tag: 'div', classes: 'gallery-body card-inner align-center justify-center flex-wrap g-2' });

            const btnGroup = create_element({ tag: 'div', classes: 'text-center' });
            const viewBtn = createButton('btn-primary', 'fa fa-eye', [{ key: 'href', value: dados.path }, { key: 'target', value: '_blank' }]);
            const editBtn = createButton('btn-primary', 'fa fa-pencil');
            const saveBtn = createButton('btn-info', 'fa fa-save');
            const downloadBtn = createButton('btn-success', 'fa fa-download', [{ key: 'href', value: dados.path }, { key: 'download', value: '' }]);
            const deleteBtn = createButton('btn-danger', 'fa fa-trash', [{ key: 'type', value: 'submit' }], 'button');

            btnGroup.append(viewBtn, editBtn, saveBtn, downloadBtn, deleteBtn);
            galleryBody.append(btnGroup);
            galleryCard.appendChild(galleryBody);
            galleryCol.appendChild(galleryCard);

            document.querySelector('#galeria').append(galleryCol);

            // Event listener para deletar imagem
            deleteBtn.addEventListener('click', async (e) => {
                e.preventDefault();
                const result = await myFetch(`/cms/delete/archives/${dados.id}`, 'DELETE');
                if (result.success) chargeGalery(table, id);
            });

            let cropperInstance = null;
            let isEditing = false;

            // Event listener para edição e rotação
            editBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (!isEditing) {
                    cropperInstance = new Cropper(galleryImage, { aspectRatio: 16 / 9 });
                    editBtn.querySelector('.icon').classList.remove('fa-pencil');
                    editBtn.querySelector('.icon').classList.add('fa-rotate-right');
                    isEditing = true;
                } else {
                    if (cropperInstance) {
                        cropperInstance.rotate(45);
                    }
                }
            });

            saveBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (cropperInstance) {
                    cropperInstance.getCroppedCanvas().toBlob((blob) => {

                        console.log(data);
                        cropperInstance.destroy();
                        cropperInstance = null;
                        isEditing = false;
                        editBtn.querySelector('.icon').classList.add('fa-pencil');
                        editBtn.querySelector('.icon').classList.remove('fa-rotate-right');

                        // const formData = new FormData();
                        // formData.append('file', blob, 'filename.jpg');

                        // fetch(`/cms/save/${dados.id}`, { // Substituir URL conforme necessário
                        //     method: 'POST',
                        //     body: formData
                        // })
                        // .then(response => response.json())
                        // .then(data => {
                        //     console.log(data);
                        //     cropperInstance.destroy();
                        //     cropperInstance = null;
                        //     isEditing = false;
                        //     editBtn.querySelector('.icon').classList.add('fa-pencil');
                        //     editBtn.querySelector('.icon').classList.remove('fa-rotate-right');
                        // })
                        // .catch(error => {
                        //     console.error('Error:', error);
                        // });
                    });
                }
            });
        });
    }
}



function createButton(classes, iconClass, params = [], tag = 'a') {
    return create_element({
        tag: tag,
        classes: `btn ${classes} text-center m-1 flex-grow-0`,
        params: params,
        conteudo: `<em class="icon ${iconClass}"></em>`
    });
}

