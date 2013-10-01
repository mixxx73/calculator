	var Calculator = function(operatorUrl){		
		var _self = this;

		this.init = function(){
			$('.digit').bind('click',_self.onDigitClick);
			$('#comma').bind('click',_self.onCommaClick);
			$('.operation').bind('click',_self.onOperationClick);
			$('#execute').bind('click',_self.onExecuteClick);
			$('#reset').bind('click',_self.resetState);

			_self.resetState();
		}

		var argument1Comma = false;
		var argument2Comma = false;

		this.resetState = function() {
 			_self.argument1 = '0';
			_self.argument2 = false;
			_self.operator = false;
			_self.result = false;

			argument1Comma = false;
			argument2Comma = false;

			_self.display();
		}
		

		this.normalizeArgument = function(a) {
			return parseFloat(a).toString();
		}
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
		}



		this.onDigitClick = function(event){
			if (_self.operator == false) {
				_self.argument1 += $(this).val();
				_self.argument1 = _self.normalizeArgument(_self.argument1);
			} else {
				if (_self.argument2 == false) _self.argument2 = '0';
				_self.argument2 += $(this).val();
				_self.argument2 = _self.normalizeArgument(_self.argument2);
			}
			_self.display();
		}

		this.onCommaClick = function(event){
			if (_self.operator == false) {
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

		this.onOperationClick = function(event){
			if (_self.operator == false) {
				_self.operator = $(this).val();
					_self.display();
			} else {
				alert('There is operator already');
			}
		}

		this.onExecuteClick = function(event){
			if (_self.operator == false){
				alert('Operator is missing');
				return false;
			}
			if (_self.argument2 == false) {
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
						_self.display();
					}
				}
			);
		}

		this.init();

	}
