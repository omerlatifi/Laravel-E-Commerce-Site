<!DOCTYPE html>
<html>

<head>
<style>
        body {
            background-color: #f8f9fa;
        }
        .help-container {
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .accordion-button {
            font-weight: bold;
        }
        .contact-box {
            background-color: rgb(230, 185, 172);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px;
        }
    </style>

@include('home.css')

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <div class="container help-container">
        <h2 class="text-center mb-4">Help & Support</h2>

        <!-- FAQs Section -->
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        How can I track my order?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        You can track your order from your profile under the "My Orders" section. A tracking link will be available once your order is shipped.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        What is the return policy?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        We offer a 7-day return policy. Items must be in their original condition. Please contact our support team for return requests.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        What payment methods do you accept?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        We accept Credit/Debit cards, PayPal, and Cash on Delivery (COD) in selected locations.
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Support -->
        <div class="contact-box">
            <h4 >Need More Help?</h4>
            <p>Contact our support team via email or call us.</p>
            <a href="mailto:support@sweety.com" class="btn btn-light">Email Us</a>
            <a href="tel:+1234567890" class="btn btn-light">Call Us</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body> 


@include ('home.footer')

</body>
</html>