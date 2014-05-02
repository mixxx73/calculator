	/**
	 * Calculator class performs all operations of calculator
	 */
	var Calculator = function(operatorUrl){
		var _self = this;

		/**
		 * Init function, called once
		 */
		this.init = function(){
			$('.digit').bind('click',_self.onDigitClick);
			$('#comma').bind('click',_self.onCommaClick);
			$('.operation').bind('click',_self.onOperationClick);
			$('#execute').bind('click',_self.onExecuteClick);
			$('#reset').bind('click',_self.resetState);

			_self.resetState();
		}

		/**
		 * private definitions
		 */
		var argument1Comma = false;
		var argument2Comma = false;

		/**
		 * Reset calculator to initial state
		 * Includes public definitions
		 */
		this.resetState = function() {
 			_self.argument1 = '0';
			_self.argument2 = false;
			_self.operator = false;
			_self.result = false;

			argument1Comma = false;
			argument2Comma = false;

			_self.display();
		}

		/**
		 * Takes care about leading zero
		 */
		this.normalizeArgument = function(a) {
			return parseFloat(a).toString();
		}

		/**
		 * Prints current operation state to display and return it
		 */
		this.display = function() {
			var r = '';
			r += _self.argument1;
			if (_self.operator !== false) {
				switch(_self.operator) {
					case "add": r += ' + '; break;
					case "substract": r += ' - '; break;
					case "multiply": r += ' * '; break;
					case "divide": r += ' / '; break;
				}
				if (_self.argument2 !== false) {
					r += _self.argument2;
					if (_self.result !== false) {
						r += ' = ' + _self.result;
					}
				}
			}
			$('#display').html(r);
			return r;
		}

		/**
		 * Checks if there is result
		 * if yes then resets calculator state for new operations
		 */
		this.checkIfResetNeeded = function() {
			if (_self.result !== false) {
				_self.resetState();
			}
		}

		/**
		 * Handles digits click
		 */
		this.onDigitClick = function(event){
			_self.checkIfResetNeeded();

			if (_self.operator === false) {
				_self.argument1 += $(this).val();
				_self.argument1 = _self.normalizeArgument(_self.argument1);
			} else {
				if (_self.argument2 === false) _self.argument2 = '0';
				_self.argument2 += $(this).val();
				_self.argument2 = _self.normalizeArgument(_self.argument2);
			}
			_self.display();
		}

		/**
		 * Handles comma click, use dot for js compability
		 */
		this.onCommaClick = function(event){
			_self.checkIfResetNeeded();

			if (_self.operator === false) {
				if ( argument1Comma == false ) {
					_self.argument1 += '.';
					argument1Comma = true;
					_self.display();
				} else {
					alert('There is comma already');
				}
			} else {
				if ( argument2Comma == false ) {
					_self.argument2 += '.';
					argument2Comma = true;
					_self.display();
				} else {
					alert('There is comma already');
				}
			}
		}

		/**
		 * Handles operations click
		 */
		this.onOperationClick = function(event){
			_self.checkIfResetNeeded();

			if (_self.operator == false) {
				_self.operator = $(this).val();
				_self.display();
			} else {
				alert('There is operator already');
			}
		}

		/**
		 * Handles getting result
		 */
		this.onExecuteClick = function(event){
			if (_self.operator === false){
				alert('Operator is missing');
				return false;
			}
			if (_self.argument2 === false) {
				alert('Argument2 is missing');
				return false;
			}
			if (_self.operator == 'divide' && parseFloat(_self.argument2) == 0) {
				alert('Can not divide by 0');
				return false;
			}
			$.getJSON(
				operatorUrl,
				{
					'argument1' : _self.argument1,
					'argument2' : _self.argument2,
					'operator' : _self.operator
				},
				function(data){
					if (data.status && data.status == 'Success' && data.result) {
						_self.result = data.result;
						var r = _self.display();
						$('#history ul').append('<li>'+r+'</li>');
					}
				}
			);
		}

		this.init();

	}
