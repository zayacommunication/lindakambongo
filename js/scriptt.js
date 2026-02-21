document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('whatsapp-toggle');
    const widget = document.getElementById('whatsapp-chat-widget');
    const closeBtn = document.querySelector('.close-btn');
    const whatsappForm = document.getElementById('whatsapp-form');
    const replyButtons = document.querySelectorAll('.reply-btn');
    
    // Numéro de téléphone de destination (à personnaliser)
    const phoneNumber = " 00243978497929";

    // Ouvrir / Fermer le widget au clic sur le bouton flottant
    toggleBtn.addEventListener('click', function() {
        widget.classList.toggle('active');
    });

    // Fermer le widget au clic sur la croix
    closeBtn.addEventListener('click', function() {
        widget.classList.remove('active');
    });

    // Gérer le clic sur les réponses rapides
    replyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const message = this.getAttribute('data-message');
            sendToWhatsApp(message);
        });
    });

    function sendToWhatsApp(message) {
        const encodedMessage = encodeURIComponent(message);
        const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
        window.open(whatsappUrl, '_blank');
    }
});
