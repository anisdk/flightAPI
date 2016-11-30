<!DOCTYPE html>
<html lang="en-US" ng-app="flightRecords">
    <head>
        <title>Manage Flights</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    </head>
    <body>
        <h2>Flights Database</h2>
        <div  ng-controller="flightsController">

            <!-- Table-to-load-the-data Part -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
						<th>Departure Airport</th>
						<th>Destination Airport</th>
						<th>Trip</th>
                        <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Flight</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="flight in flights">
                        <td>{{  flight.id }}</td>
						<td>{{  flight.dep_airport.name }}</td>
						<td>{{  flight.dest_airport.name }}</td>
						<td>{{  flight.trip.name }}</td>
                        <td>
                            <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', flight.id)">Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(flight.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmEmployees" class="form-horizontal" novalidate="">

                                <!--div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Id</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" disabled id="id" name="id" value="{{id}}" 
                                        ng-model="flight.id" ng-required="true">									  
                                    </div>
                                </div-->
                          
								<div class="form-group" ng-hide="modalstate != 'add'">
                                    <label for="" class="col-sm-3 control-label">Trip</label>
                                    <div class="col-sm-9">
                                        <select name="trip" id="trip" class="form-control"
                                            ng-options="option.name for option in trips track by option.id"
                                            ng-model="flight.trip_id">
										</select>
                                    </div>									
                                </div>
                            								
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Departure Airport</label>
                                    <div class="col-sm-9">
                                        <select name="dep_airport" id="dep_airport" class="form-control"
                                            ng-options="option.name for option in airports track by option.id"
                                            ng-model="flight.dep_airport">
										</select>
                                    </div>
                                </div>

								<div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Destination Airport</label>
                                    <div class="col-sm-9">
                                        <select name="dest_airport" id="dest_airport" class="form-control"
                                            ng-options="option.name for option in airports track by option.id"
                                            ng-model="flight.dest_airport">
										</select>
                                    </div>
                                </div>


                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('js/jquery.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
        
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/flights.js') ?>"></script>
    </body>
</html>