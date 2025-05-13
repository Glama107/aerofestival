const posterImage = document.getElementById('poster-img');
const posterModal = document.getElementById('poster-modal');
const closeBtn = document.querySelector('.close-btn');

posterImage.addEventListener('click', () => {
    posterModal.classList.add('active');
    posterModal.style.display = 'flex';
});

function closeModal() {
    posterModal.classList.remove('active');
    posterModal.classList.add('closing');

    setTimeout(() => {
        posterModal.classList.remove('closing');
        posterModal.style.display = 'none';
    }, 300);
}

closeBtn.addEventListener('click', closeModal);

posterModal.addEventListener('click', (e) => {
    if (e.target === posterModal) {
        closeModal();
    }
});