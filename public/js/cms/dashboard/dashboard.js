document.querySelector('#sidebarCollapse').onclick = (target) => {
    let sidebar = document.querySelector('#sidebar');

    sidebar.classList.toggle('active');

    if ([...sidebar.classList].includes('active')) {
        document.querySelector('.btn-side').innerHTML = 'Exibir Menu';
    } else {
        document.querySelector('.btn-side').innerHTML = 'Minimizar Menu';
    }
};
