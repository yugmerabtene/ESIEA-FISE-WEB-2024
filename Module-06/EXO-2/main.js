document.addEventListener('DOMContentLoaded', function() {
    const display = document.getElementById('display');
    const numbers = document.querySelectorAll('.number');
    const operators = document.querySelectorAll('.operator');
    const decimal = document.querySelector('.decimal');
    const equal = document.getElementById('equal');
    const clear = document.getElementById('clear');

    let currentInput = '0';
    let operator = '';
    let previousInput = '0';

    function updateDisplay() {
        display.value = currentInput;
    }

    function appendToCurrentInput(value) {
        if (currentInput === '0' && value !== '.') {
            currentInput = value;
        } else {
            currentInput += value;
        }
        updateDisplay();
    }

    function clearInput() {
        currentInput = '0';
        previousInput = '0';
        operator = '';
        updateDisplay();
    }

    function handleNumberClick(event) {
        appendToCurrentInput(event.target.textContent);
    }

    function handleOperatorClick(event) {
        if (operator !== '') {
            performCalculation();
        }
        operator = event.target.textContent;
        previousInput = currentInput;
        currentInput = '';
    }

    function handleDecimalClick() {
        if (!currentInput.includes('.')) {
            currentInput += '.';
            updateDisplay();
        }
    }

    function performCalculation() {
        const prev = parseFloat(previousInput);
        const current = parseFloat(currentInput);
        if (!isNaN(prev) && !isNaN(current)) {
            switch (operator) {
                case '+':
                    currentInput = prev + current;
                    break;
                case '-':
                    currentInput = prev - current;
                    break;
                case '*':
                    currentInput = prev * current;
                    break;
                case '/':
                    currentInput = prev / current;
                    break;
            }
        }
        updateDisplay();
    }

    function handleEqualClick() {
        performCalculation();
        operator = '';
        previousInput = currentInput;
    }

    // Event Listeners
    numbers.forEach(number => {
        number.addEventListener('click', handleNumberClick);
    });

    operators.forEach(operator => {
        operator.addEventListener('click', handleOperatorClick);
    });

    decimal.addEventListener('click', handleDecimalClick);

    equal.addEventListener('click', handleEqualClick);

    clear.addEventListener('click', clearInput);
});
