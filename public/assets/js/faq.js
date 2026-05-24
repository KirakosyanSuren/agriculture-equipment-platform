document.querySelectorAll('.faq-question').forEach(question => {

    question.addEventListener('click', () => {

        const item = question.parentElement;

        document.querySelectorAll('.faq-item').forEach(faq => {

            if(faq !== item){
                faq.classList.remove('active');
            }

        });

        item.classList.toggle('active');

    });

});
