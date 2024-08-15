document.addEventListener('DOMContentLoaded', () => {
    const hoverTextElement = document.getElementById('name-before');
    const originalText = hoverTextElement.textContent;
    const newText = "Your Road To Sucess!";

    hoverTextElement.addEventListener('mouseover', () => {
        hoverTextElement.classList.add('hidden');
        setTimeout(() => {
            hoverTextElement.textContent = newText;
            hoverTextElement.classList.remove('hidden');
        }, 500); 
    });

    hoverTextElement.addEventListener('mouseout', () => {
        hoverTextElement.classList.add('hidden');
        setTimeout(() => {
            hoverTextElement.textContent = originalText;
            hoverTextElement.classList.remove('hidden');
        }, 500); 
    });
});
