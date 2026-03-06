<style>
    /* Social Media Section Styling */
    .social-media-section {
        background-color: var(--neutral-dark-color);
        /* YouTube pure dark mode background */
    }

    .social-card {
        display: block;
        text-align: center;
        padding: 30px 20px;
        background: var(--dark-gray-color);
        border-radius: 16px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid var(--deep-color);
    }

    .social-icon-box {
        font-size: 2.5rem;
        margin-bottom: 15px;
        transition: transform 0.3s ease;
    }

    .social-card h5 {
        color: var(--white-color);
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .social-card p {
        color: var(--deep-color);
        font-size: 0.85rem;
        margin: 0;
    }

    /* Hover Effects with Brand Colors */
    .social-card:hover {
        transform: translateY(-10px);
        border-color: var(--deep-color);
    }

    .social-icon-box {
        color: #aaa;
    }

    /* Brand Specific Colors on Hover */
    .telegram:hover .social-icon-box {
        color: #0088cc;
    }

    .youtube:hover .social-icon-box {
        color: #ff0000;
    }

    .facebook:hover .social-icon-box {
        color: #1877f2;
    }

    .instagram:hover .social-icon-box {
        color: #e4405f;
    }

    /* WhatsApp Hover Color */
    .whatsapp:hover .social-icon-box {
        color: #25D366;
    }

    /* Twitter (X) Hover Color */
    .twitter:hover .social-icon-box {
        color: #1DA1F2;
        /* Traditional Twitter Blue */
        /* Or use #FFFFFF if you want the new 'X' look on a dark background */
    }

    .social-card:hover h5 {
        color: var(--white-color);
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
    }

    /* Responsive Grid for Small Screens */
    @media (max-width: 576px) {
        .social-card {
            padding: 20px 10px;
        }

        .social-icon-box {
            font-size: 2rem;
        }
    }

    /* Tooltip wrapper */
    .copy-wrapper {
        position: relative;
        display: inline-block;
    }

    /* Tooltip text style */
    .copy-tooltip {
        visibility: hidden;
        width: 60px;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 4px;
        padding: 3px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        /* Icon er upore show korbe */
        left: 50%;
        margin-left: -30px;
        opacity: 0;
        transition: opacity 0.3s;
        font-size: 12px;
    }

    /* Tooltip er nicher chotto arrow */
    .copy-tooltip::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #333 transparent transparent transparent;
    }

    /* Show hole opacity barbe */
    .show-tooltip .copy-tooltip {
        visibility: visible;
        opacity: 1;
    }

    /* Custom Modal Styling */
    .custom-modal-bg {
        background: rgba(18, 18, 18, 0.95);
        /* Dark background like the screenshot */
        border: 2px solid #00d2ff;
        /* Neon blue border */
        border-radius: 25px;
        box-shadow: 0 0 30px rgba(0, 210, 255, 0.4);
        /* Premium Glow effect */
        position: relative;
        overflow: hidden;
    }

    /* Glassmorphism effect for modal */
    .custom-modal-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at center, rgba(0, 210, 255, 0.1) 0%, transparent 70%);
        pointer-events: none;
    }

    .modal-title-custom {
        color: #00d2ff;
        /* Sky blue title */
        font-weight: 800;
        font-size: 1.4rem;
        text-shadow: 0 0 10px rgba(0, 210, 255, 0.3);
    }

    .modal-text-custom {
        color: #ffffff;
        font-size: 1rem;
        font-weight: 400;
    }

    /* Modal Buttons Styling */
    .btn-modal {
        padding: 10px 35px;
        border-radius: 12px;
        font-weight: bold;
        font-size: 1.1rem;
        border: none;
        min-width: 140px;
        transition: 0.3s;
        color: white;
    }

    .btn-yes {
        background: linear-gradient(145deg, #28a745, #1e7e34);
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.4);
    }

    .btn-no {
        background: linear-gradient(145deg, #dc3545, #a71d2a);
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.4);
    }

    .btn-modal:hover {
        transform: translateY(-3px);
        filter: brightness(1.2);
    }

    /* Modal Backdrop Blur (Optional: Makes background blurry when popup opens) */
    .modal-backdrop.show {
        backdrop-filter: blur(5px);
        background-color: rgba(0, 0, 0, 0.8);
    }
</style>
