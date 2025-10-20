<section id="contact" class="content py-5" style="background-color: #f4f6f9;">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Get in Touch</h2>
        <div class="row g-4 d-flex align-items-stretch">

            <!-- Contact Info Box -->
            <div class="col-md-6">
                <div class="h-100 p-5 bg-white rounded-4 shadow-lg d-flex flex-column justify-content-center">
                    <h5 class="mb-4 text-primary"><i class="fas fa-envelope me-2"></i> Email</h5>
                    <p class="fs-5 text-muted mb-4">demo@gmail.com</p>

                    <h5 class="mb-4 text-primary"><i class="fas fa-phone me-2"></i> Phone</h5>
                    <p class="fs-5 text-muted mb-4">+123-456-7890</p>

                    <h5 class="mb-4 text-primary"><i class="fas fa-map-marker-alt me-2"></i> Address</h5>
                    <p class="fs-5 text-muted">123 Medical Street, Health City</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-6">
                <div class="h-100 p-5 bg-white rounded-4 shadow-lg d-flex flex-column justify-content-center">
                    <form action="#" method="post">
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">Your Name</label>
                            <input type="text" id="name" name="name" class="form-control rounded-4 px-4 py-3" placeholder="Please enter your name" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">Your Email</label>
                            <input type="email" id="email" name="email" class="form-control rounded-4 px-4 py-3" placeholder="Please enter your gmail" required>
                        </div>

                        <div class="mb-4">
                            <label for="note" class="form-label fw-bold">Your Message</label>
                            <textarea id="note" name="note" rows="4" class="form-control rounded-4 px-4 py-3" placeholder="Write your message here..." required></textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-gradient px-5 py-2 rounded-pill fw-bold">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Gradient Button Style -->
<style>
    .btn-gradient {
        background: linear-gradient(135deg, #00c9ff, #92fe9d);
        border: none;
        color: #fff;
        transition: 0.4s ease;
    }

    .btn-gradient:hover {
        background: linear-gradient(135deg, #007bff, #28a745);
        color: #fff;
    }

    textarea::placeholder,
    input::placeholder {
        color: #aaa;
    }
</style>
