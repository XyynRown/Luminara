window.getQueryParam = function (param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

window.showModal = function (modalId) {
    const modalElement = document.getElementById(modalId);
    if (modalElement) {
        const modal = new bootstrap.Modal(modalElement);
        modal.show();
    } else {
        console.error(`Modal with ID ${modalId} not found.`);
    }
}