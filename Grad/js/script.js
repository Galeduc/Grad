document.addEventListener('DOMContentLoaded', function () {
    const images = document.querySelectorAll('.img4');

    images.forEach(function (image) {
        image.addEventListener('mouseover', function () {
        });

        image.addEventListener('click', function () {
            const enlargedImage = document.createElement('img');
            enlargedImage.src = image.src;
            enlargedImage.alt = image.alt;
            enlargedImage.style.maxWidth = '80%';
            enlargedImage.style.maxHeight = '80%';

            const modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
            modal.style.display = 'flex';
            modal.style.justifyContent = 'center';
            modal.style.alignItems = 'center';
            modal.appendChild(enlargedImage);
            document.body.appendChild(modal);
            modal.addEventListener('click', function () {
                document.body.removeChild(modal);

            });
        });
    });
});