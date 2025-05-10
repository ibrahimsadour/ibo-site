function updateCharCount(input, counterId) {
    const maxLength = input.getAttribute('maxlength');
    const currentLength = input.value.length;
    const counter = document.getElementById(counterId);
    counter.textContent = `${currentLength} / ${maxLength}`;
    
    // تغيير اللون عند الوصول إلى الحد الأقصى
    if (currentLength == maxLength) {
        counter.style.color = 'red';
    } else {
        counter.style.color = '#007bff'; // اللون الافتراضي للنص
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const inputs = document.querySelectorAll('[maxlength]');
    inputs.forEach((input) => {
        const counterId = input.getAttribute('id') + '_counter';
        updateCharCount(input, counterId);
    });
});
