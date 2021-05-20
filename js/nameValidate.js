document.addEventListener("DOMContentLoaded", function () {

    // Третий варинат
    // Add the novalidate attribute when the JS loads
    let forms = document.querySelectorAll('.validate');
    let spanName = document.querySelector('.form__span');
    for (let i = 0; i < forms.length; i++) {
        forms[i].setAttribute('novalidate', true);
    }

    // Validate the field
    let hasError = function (field) {
        // Don't validate submits, buttons, file and reset inputs, and disabled fields
        if (field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') return;
        // Get validity
        let validity = field.validity;
        // If valid, return null
        if (validity.valid) return;
        // If field is required and empty
        if (validity.valueMissing) return 'Пожалуйста заполните это поле';
        // If not the right type
        if (validity.typeMismatch) {
            // Email
            if (field.type === 'email') return 'Введите почтовый адрес';
            // Name
            if (field.type === 'text') return 'Введите имя';
            //number
            if (field.type === 'tel') return 'Введите телефон (только цифры)';
        }
        // If too short
        if (validity.tooShort) return 'Введите хотя бы ' + field.getAttribute('minLength') + ' символа. Сейчас введен ' + field.value.length + ' символ';
        // If too long
        if (validity.tooLong) return 'Максимальное количество ' + field.getAttribute('maxLength') + ' символа. Вы ввели ' + field.value.length + ' символов';
        // If number input isn't a number
        if (validity.badInput) return 'Please enter a number.';
        // If a number value doesn't match the step interval
        if (validity.stepMismatch) return 'Please select a valid value.';
        // If a number field is over the max
        if (validity.rangeOverflow) return 'Please select a value that is no more than ' + field.getAttribute('max') + '.';
        // If a number field is below the min
        if (validity.rangeUnderflow) return 'Please select a value that is no less than ' + field.getAttribute('min') + '.';
        // If pattern doesn't match
        if (validity.patternMismatch) {
            // If pattern info is included, return custom error
            if (field.hasAttribute('title')) return field.getAttribute('title');
            // Otherwise, generic error
            return 'Неправильный формат данных';
        }
        // If all else fails, return a generic catchall error
        return 'The value you entered for this field is invalid.';
    };
    // Show an error message
    let showError = function (field, error) {
        // Add error class to field
        field.classList.add('error');
        // Get field id or name
        let id = field.id || field.name;
        if (!id) return;
        // Check if error message field already exists
        // If not, create one
        let message = field.form.querySelector('.error-message#error-for-' + id );
        if (!message) {
            message = document.createElement('div');
            message.className = 'error-message';
            message.id = 'error-for-' + id;
            field.parentNode.insertBefore( message, field.nextSibling );
        }
        // Add ARIA role to the field
        field.setAttribute('aria-describedby', 'error-for-' + id);
        // Update error message
        message.innerHTML = error;
        // Show error message
        message.style.display = 'block';
        message.style.visibility = 'visible';
    };
    // Remove the error message
    let removeError = function (field) {
        // Remove error class to field
        field.classList.remove('error');
        // Remove ARIA role from the field
        field.removeAttribute('aria-describedby');
        // Get field id or name
        let id = field.id || field.name;
        if (!id) return;
        // Check if an error message is in the DOM
        let message = field.form.querySelector('.error-message#error-for-' + id + '');
        if (!message) return;
        // If so, hide it
        message.innerHTML = '';
        message.style.display = 'none';
        message.style.visibility = 'hidden';
    };
    // Listen to all blur events
    document.addEventListener('blur', function (event) {
        // Only run if the field is in a form to be validated
        if (!event.target.form.classList.contains('validate')) return;
        // Validate the field
        let error = hasError(event.target);
        // If there's an error, show it
        if (error) {
            showError(event.target, error);
            return;
        }
        // Otherwise, remove any existing error message
        removeError(event.target);
    }, true);
    // Check all fields on submit
    document.addEventListener('submit', function (event) {
        // Only run on forms flagged for validation
        if (!event.target.classList.contains('validate')) return;
        // Get all of the form elements
        var fields = event.target.elements;
        // Validate each field
        // Store the first field with an error to a variable so we can bring it into focus later
        var error, hasErrors;
        for (var i = 0; i < fields.length; i++) {
            error = hasError(fields[i]);
            if (error) {
                showError(fields[i], error);
                if (!hasErrors) {
                    hasErrors = fields[i];
                }
            }
        }
        // If there are errrors, don't submit form and focus on first element with error
        if (hasErrors) {
            event.preventDefault();
            hasErrors.focus();
        }
        // Otherwise, let the form submit normally
        // You could also bolt in an Ajax form submit process here
    }, false);
    //вывод количества символов
    document.addEventListener('input', function (event) {
        if (event.target.type === 'text') {
            spanName.innerText = (event.target.value.length + ' символов');
        }
    }, true);
});