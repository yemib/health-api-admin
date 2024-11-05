document.addEventListener("DOMContentLoaded", function () {
    // Sample data for images, replace these with your actual data
    const imageData = [
      { filename: 'hero-image1.jpg', title: 'Hero Image 1', description: 'This is the first hero image.' },
      { filename: 'hero-image2.jpg', title: 'Hero Image 2', description: 'This is the second hero image.' },
      { filename: 'logo.png', title: 'Logo', description: 'The logo of our website.' },
      // Add more image data as needed
    ];
  
    const galleryContainer = document.getElementById('gallery');
  
    // Loop through image data and create gallery items
    imageData.forEach((data, index) => {
      const galleryItem = document.createElement('div');
      galleryItem.className = 'col-lg-4 col-md-6 mb-4';
      galleryItem.innerHTML = `
        <a href="${data.filename}" data-lightbox="gallery-item" data-title="${data.title} - ${data.description}">
          <div class="card">
            <img src="${data.filename}" class="card-img-top" alt="${data.title}">
            <div class="card-body">
              <h5 class="card-title">${data.title}</h5>
              <p class="card-text">${data.description}</p>
            </div>
          </div>
        </a>
      `;
      galleryContainer.appendChild(galleryItem);
    });
  });
  