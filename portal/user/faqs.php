<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeowners Portal</title>
    <link rel="stylesheet" href="">
    <style>
        /* styles.css */
   
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #c9cecb;
    
    
}

nav {
    background-color: #006400;
    text-align: right;
}

nav a {
    display: inline-block;
    padding: 20px 20px;
    text-decoration: none;
    color: #fff;
}
/* nav bar ^^ */
.faq-container {
    width: 100%;
    max-width: 1300px;
    margin: 0 auto;
}

.faq {
    background-color: #fff;
    padding: 30px;
    margin: 15px 0;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}

.question {
    font-weight: bold;
    cursor: pointer;
}

.answer {
    display: none;
    margin-top: 10px;
}

/* Hover effect */
.faq:hover {
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
}


.faq .answer {
    display: none;
}
.faq.active .answer {
    display: block;
}


h1 {
    text-align:center;
}
</style>
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
      
        <a href="faqs.php">FAQs</a>
        <a href="officer.php">Officer</a>
        <a href="../login.php">Login
        </a>
    </nav>
    <br>
<h1>Community Question</h1>
 <br>
    <div class="faq-container">
        <div class="faq">
            <div class="question">Q1: Why choose Villa Arcadia Subdivision?</div>
            <div class="answer">A1: Lorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
        </div>
        <div class="faq">
            <div class="question">Q2: How Villa Arcadia Subdivision manage?</div>
            <div class="answer">A1: Lorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
        </div>
        <div class="faq">
            <div class="question">Q3: What type of things can homeowners association regulate?</div>
            <div class="answer">A1: Lorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
        </div>
        <div class="faq">
            <div class="question">Q4: How can I know that the fees collected are being utilized?</div>
            <div class="answer">A1: Lorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
        </div>
        <div class="faq">
            <div class="question">Q5: What is Lorem Ipsum?</div>
            <div class="answer">A1: Lorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
        </div>
        <div class="faq">
            <div class="question">Q6: What is Lorem Ipsum?</div>
            <div class="answer">A1: Lorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
        </div>
        <div class="faq">
            <div class="question">Q7: What is Lorem Ipsum?</div>
            <div class="answer">A1: Lorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printinLorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
        </div>
        <!-- Add more FAQ items here -->
    </div>
    <script>
        const faqItems = document.querySelectorAll('.faq');

        faqItems.forEach((faq) => {
    const question = faq.querySelector('.question');
    const answer = faq.querySelector('.answer');

    question.addEventListener('click', () => {
        if (answer.style.display === 'none') {
            answer.style.display = 'block';
        } else {
            answer.style.display = 'none';
        }
    });
});


    </script>
  
  
</body>
</html>
