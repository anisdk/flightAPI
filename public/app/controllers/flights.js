app.controller('flightsController', function($scope, $http, API_URL) {
    //retrieve flights listing from API
    $http.get(API_URL + "flight")
            .success(function(response) {
                $scope.flights = response;
            });
    
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Flight";
                $http.get(API_URL + 'airport')
                        .success(function(response) {
                            console.log(response);
                            $scope.airports = response;
                        });	
                $http.get(API_URL + 'trip')
                        .success(function(response) {
                            console.log(response);
                            $scope.trips = response;
                        });									
				$scope.id = null;
				
                break;
            case 'edit':
                $scope.form_title = "Flight Detail";
                $scope.id = id;
                $http.get(API_URL + 'flight/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.flight = response;
                        });
						
                $http.get(API_URL + 'airport')
                        .success(function(response) {
                            console.log(response);
                            $scope.airports = response;
                        });						
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "flight";
        
        //append flight id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.flight),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'flight/' + id
            }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }
});
