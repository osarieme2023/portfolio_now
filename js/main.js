
console.log("Lightbox JS loaded");

class PortfolioLightbox {
    constructor() {
        this.currentIndex = 0;
        this.images = [];
        this.lightboxOpen = false;
        this.init();
    }

    init() {
        this.createLightboxHTML();
        this.bindEvents();
        this.setupImageGallery();
    }

    createLightboxHTML() {
        
        const lightboxHTML = `
            <div id="portfolio-lightbox" class="lightbox-overlay">
                <div class="lightbox-container">
                    <button class="lightbox-close">&times;</button>
                    <button class="lightbox-prev">‹</button>
                    <button class="lightbox-next">›</button>
                    
                    <div class="lightbox-content">
                        <img src="" alt="" class="lightbox-image">
                        <div class="lightbox-info">
                            <h3 class="lightbox-title"></h3>
                            <p class="lightbox-description"></p>
                        </div>
                    </div>
                    
                    <div class="lightbox-counter">
                        <span class="current">1</span> / <span class="total">1</span>
                    </div>
                </div>
            </div>
        `;
        
        document.body.insertAdjacentHTML('beforeend', lightboxHTML);
        this.lightbox = document.getElementById('portfolio-lightbox');
    }

    setupImageGallery() {
        
        const galleryImages = document.querySelectorAll('.project-box img, .case-study img, .lightbox-trigger');
        
        this.images = Array.from(galleryImages).map((img, index) => {
            
            img.addEventListener('click', (e) => {
                e.preventDefault();
                this.openLightbox(index);
            });
            
            
            img.style.cursor = 'pointer';
            
            
            return {
                src: img.src,
                alt: img.alt,
                title: this.getImageTitle(img),
                description: this.getImageDescription(img)
            };
        });
    }

    getImageTitle(img) {
        
        const projectBox = img.closest('.project-box');
        if (projectBox) {
            const titleElement = projectBox.querySelector('h3');
            return titleElement ? titleElement.textContent : img.alt;
        }
        return img.alt || 'Portfolio Image';
    }

    getImageDescription(img) {
       
        const projectBox = img.closest('.project-box');
        if (projectBox) {
            const descElement = projectBox.querySelector('.project-text p');
            return descElement ? descElement.textContent : '';
        }
        return '';
    }

    bindEvents() {
        
        document.addEventListener('click', (e) => {
            if (e.target.matches('.lightbox-close')) {
                this.closeLightbox();
            }
        });

        
        document.addEventListener('click', (e) => {
            if (e.target.matches('.lightbox-prev')) {
                this.prevImage();
            }
            if (e.target.matches('.lightbox-next')) {
                this.nextImage();
            }
        });

        
        document.addEventListener('click', (e) => {
            if (e.target.matches('.lightbox-overlay')) {
                this.closeLightbox();
            }
        });

        
        document.addEventListener('keydown', (e) => {
            if (!this.lightboxOpen) return;
            
            switch(e.key) {
                case 'Escape':
                    this.closeLightbox();
                    break;
                case 'ArrowLeft':
                    this.prevImage();
                    break;
                case 'ArrowRight':
                    this.nextImage();
                    break;
            }
        });

        
        let startX = 0;
        let startY = 0;
        
        this.lightbox.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            startY = e.touches[0].clientY;
        });
        
        this.lightbox.addEventListener('touchend', (e) => {
            if (!startX || !startY) return;
            
            const endX = e.changedTouches[0].clientX;
            const endY = e.changedTouches[0].clientY;
            
            const diffX = startX - endX;
            const diffY = startY - endY;
            
            
            if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 50) {
                if (diffX > 0) {
                    this.nextImage();
                } else {
                    this.prevImage();
                }
            }
            
            startX = 0;
            startY = 0;
        });
    }

    openLightbox(index) {
        this.currentIndex = index;
        this.lightboxOpen = true;
        
        this.updateLightboxContent();
        this.lightbox.classList.add('active');
        document.body.style.overflow = 'hidden'; 
        
        
        this.lightbox.querySelector('.lightbox-close').focus();
    }

    closeLightbox() {
        this.lightboxOpen = false;
        this.lightbox.classList.remove('active');
        document.body.style.overflow = ''; 
    }

    nextImage() {
        this.currentIndex = (this.currentIndex + 1) % this.images.length;
        this.updateLightboxContent();
    }

    prevImage() {
        this.currentIndex = this.currentIndex === 0 ? this.images.length - 1 : this.currentIndex - 1;
        this.updateLightboxContent();
    }

    updateLightboxContent() {
        const currentImage = this.images[this.currentIndex];
        
        const img = this.lightbox.querySelector('.lightbox-image');
        const title = this.lightbox.querySelector('.lightbox-title');
        const description = this.lightbox.querySelector('.lightbox-description');
        const counter = this.lightbox.querySelector('.lightbox-counter');
        
       
        img.style.opacity = '0';
        img.onload = () => {
            img.style.opacity = '1';
        };
        
        img.src = currentImage.src;
        img.alt = currentImage.alt;
        title.textContent = currentImage.title;
        description.textContent = currentImage.description;
        
       
        counter.querySelector('.current').textContent = this.currentIndex + 1;
        counter.querySelector('.total').textContent = this.images.length;
        
       
        const prevBtn = this.lightbox.querySelector('.lightbox-prev');
        const nextBtn = this.lightbox.querySelector('.lightbox-next');
        
        prevBtn.style.display = this.images.length > 1 ? 'block' : 'none';
        nextBtn.style.display = this.images.length > 1 ? 'block' : 'none';
    }


    addImage(imgElement) {
        const imageData = {
            src: imgElement.src,
            alt: imgElement.alt,
            title: this.getImageTitle(imgElement),
            description: this.getImageDescription(imgElement)
        };
        
        this.images.push(imageData);
        
        imgElement.addEventListener('click', (e) => {
            e.preventDefault();
            this.openLightbox(this.images.length - 1);
        });
        
        imgElement.style.cursor = 'pointer';
    }
}


const lightboxStyles = `
<style>
.lightbox-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.95);
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.lightbox-overlay.active {
    opacity: 1;
    visibility: visible;
}

.lightbox-container {
    position: relative;
    max-width: 90vw;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.lightbox-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-height: 80vh;
}

.lightbox-image {
    max-width: 100%;
    max-height: 70vh;
    object-fit: contain;
    transition: opacity 0.3s ease;
    border-radius: 8px;
    border: 2px solid #ff0000;
}

.lightbox-info {
    text-align: center;
    color: #ff0000;
    padding: 20px;
    max-width: 600px;
}

.lightbox-title {
    font-family: "Libre Baskerville", serif;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #ff0000;
}

.lightbox-description {
    font-family: "Libre Baskerville", serif;
    font-size: 16px;
    line-height: 1.6;
    color: #ff4444;
    margin: 0;
}

.lightbox-close {
    position: absolute;
    top: -50px;
    right: 0;
    background: none;
    border: none;
    color: #ff0000;
    font-size: 40px;
    cursor: pointer;
    z-index: 10001;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.lightbox-close:hover {
    color: #ff4444;
    transform: scale(1.1);
}

.lightbox-prev,
.lightbox-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 0, 0, 0.2);
    border: 2px solid #ff0000;
    color: #ff0000;
    font-size: 30px;
    cursor: pointer;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
}

.lightbox-prev {
    left: -80px;
}

.lightbox-next {
    right: -80px;
}

.lightbox-prev:hover,
.lightbox-next:hover {
    background: rgba(255, 0, 0, 0.4);
    border-color: #ff4444;
    color: #ff4444;
    transform: translateY(-50%) scale(1.1);
}

.lightbox-counter {
    color: #ff0000;
    font-family: "Libre Baskerville", serif;
    font-size: 16px;
    margin-top: 15px;
    opacity: 0.9;
    background: rgba(255, 0, 0, 0.1);
    padding: 8px 16px;
    border-radius: 20px;
    border: 1px solid #ff0000;
}

/* Mobile responsive */
@media (max-width: 768px) {
    .lightbox-prev {
        left: 10px;
    }
    
    .lightbox-next {
        right: 10px;
    }
    
    .lightbox-close {
        top: 10px;
        right: 10px;
    }
    
    .lightbox-title {
        font-size: 20px;
    }
    
    .lightbox-description {
        font-size: 14px;
    }
    
    .lightbox-info {
        padding: 15px;
    }
}

/* Loading animation */
.lightbox-image[src=""] {
    background: linear-gradient(-90deg, #ff0000 0%, #ff4444 50%, #ff0000 100%);
    background-size: 400% 400%;
    animation: loading 1.5s ease-in-out infinite;
}

@keyframes loading {
    0% { background-position: 400% 0; }
    100% { background-position: -400% 0; }
}
</style>
`;


document.head.insertAdjacentHTML('beforeend', lightboxStyles);


document.addEventListener('DOMContentLoaded', () => {
    window.portfolioLightbox = new PortfolioLightbox();
});


window.PortfolioLightbox = PortfolioLightbox;