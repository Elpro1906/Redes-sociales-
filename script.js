document.addEventListener('DOMContentLoaded', () => {
    const likeButton = document.getElementById('likeButton');
    const likeCount = document.getElementById('likeCount');

    const updateLikeCount = () => {
        const storedCount = localStorage.getItem('likeCount') || 0;
        likeCount.textContent = storedCount;
    };

    updateLikeCount();
    const userLiked = localStorage.getItem('userLiked');
    if (userLiked === 'true') {
        likeButton.classList.add('active');
    }

    likeButton.addEventListener('click', () => {
        const userLiked = localStorage.getItem('userLiked') === 'true';

        if (!userLiked) {
            let count = parseInt(localStorage.getItem('likeCount') || 0);
            count++;
            localStorage.setItem('likeCount', count);
            localStorage.setItem('userLiked', 'true');
            likeButton.classList.add('active');
        } else {
            let count = parseInt(localStorage.getItem('likeCount') || 0);
            count--;
            localStorage.setItem('likeCount', count);
            localStorage.setItem('userLiked', 'false');
            likeButton.classList.remove('active');
        }

        updateLikeCount();
    });
});
