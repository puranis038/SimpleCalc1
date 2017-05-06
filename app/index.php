<html>
	<head>
		<title></title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
		<style>
			html {
					position: relative;
					min-height: 100%;
				}

				body {
					margin-bottom: 60px;
				}


				html, body {
					font-family: 'Open Sans', sans-serif;
					min-height: 100%;
					max-height: 100%;
					overflow: visible;
					counter-reset: section;
					overflow-x:hidden;
				}

				h1, h2, h3, h4, h5, h6 {
					font-family: 'Open Sans', sans-serif;
				}

				.footer
				{
					position: relative;
					width: 100%;
						margin-top:35px;
					/* Set the fixed height of the footer here */
					
				}

				.navbarcolor
				{
					color:white;
				}
		</style>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
			angular.module('myApp', []);
			angular.module('myApp').controller('CalcCtrl', function ($scope) {
				$scope.toggleSimpleInterestResult = false;
				$scope.toggleCompoundInterestResult = false;

				$scope.simpleCalc = function (principal, rate, time) {
					$scope.result = parseInt(principal) * (parseInt(rate) / 100) * parseInt(time);
					$scope.toggleSimpleInterestResult = true;
				}

				$scope.compoundCalc = function (principal, rate, time) {
					$scope.result = parseInt(principal) * Math.pow(1 + (parseInt(rate) / 100), parseInt(time));
					$scope.toggleCompoundInterestResult = true;
				}
			});
		</script>
	</head>
	<body>
        <div data-ng-app="myApp">
            <div class="container-fluid" data-ng-controller="CalcCtrl">
                <div id="right">
                    <h4>Calculate Screen</h4>
                    <div class="col-md-12">
                        <label class="col-md-3" style="padding-left: 0px;">Select the type of Calculation: </label>
                        <div class="col-md-4" style="padding-left: 8px;">
                            <div>
                                <select class="col-md-12 form-control" name="type" ng-model="calculation.type" ng-dropdown required >
                                    <option disabled="disabled">Calculation Type</option>
                                    <option ng-option value="Simple Interest">Simple Interest</option>
                                    <option ng-option value="Compound Interest">Compound Interest</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="SimpleInterest" ng-if="calculation.type == 'Simple Interest'">
                        <form class="form-horizontal" name="form">
                            <div class="form-group">
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <label class="col-md-3">Principal:</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input class="form-control" type="text" data-ng-model="principal" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="col-md-3">Rate of Interest:</label>
                                    <div class="col-md-4">
                                        <div class="input-group">                                            
                                            <input type="text" class="form-control" data-ng-model="rate" />
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="col-md-3">Time:</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" data-ng-model="time" />
                                            <span class="input-group-addon">Years</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <input type="button" value="Calculate" class="btn btn-primary" data-ng-click="simpleCalc(principal, rate, time)">
                                    </div>
                                </div>
                            </div>
                            <div class="row" data-ng-show="toggleSimpleInterestResult">
                                <div class="col-md-12">
                                    <div class="col-md-4" style="margin-top: 10px;">
                                        <b>Simple Interest Result = {{result | number:2}}</b>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-xs-12" id="CompoundInterest" ng-if="calculation.type == 'Compound Interest'">
                        <form class="form-horizontal" name="form">
                            <div class="form-group">
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <label class="col-md-3" style="padding-left: 0px;">Principal Amount:</label>
                                    <div class="col-md-4" style="padding-left: 8px;">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input class="form-control" type="text" data-ng-model="principal" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="col-md-3" style="padding-left: 0px;">Annual rate:</label>
                                    <div class="col-md-4" style="padding-left: 8px;">
                                        <div class="input-group">                                            
                                            <input type="text" class="form-control" data-ng-model="rate" />
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="col-md-3" style="padding-left: 0px;">Total no. of years:</label>
                                    <div class="col-md-4" style="padding-left: 8px;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" data-ng-model="time" />
                                            <span class="input-group-addon">Years</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4" style="padding-left: 0px;">
                                        <input type="button" value="Calculate" class="btn btn-primary" data-ng-click="compoundCalc(principal, rate, time)">
                                    </div>
                                </div>
                            </div>
                            <div class="row" data-ng-show="toggleCompoundInterestResult">
                                <div class="col-md-12">
                                    <div class="col-md-4" style="margin-top: 10px;">
                                        <b>Compound Interest Result = {{result | number:2}}</b>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>