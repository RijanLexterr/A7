/* HMCF Prime - Controllers */
(function () {
  'use strict';

  var app = angular.module('hmcfApp');

  // ---------------------------------------------------------------
  // Dashboard
  // ---------------------------------------------------------------
  app.controller('DashboardController', ['DashboardService', function (DashboardService) {
    var vm = this;
    vm.loading = true;
    vm.error = '';
    vm.stats = null;

    DashboardService.get().then(
      function (data) {
        vm.stats = data;
        vm.loading = false;
      },
      function (res) {
        vm.error = (res.data && res.data.message) || 'Could not load dashboard.';
        vm.loading = false;
      }
    );

    vm.printReceipt = function (a) {
      window.open('print/receipt.html?id=' + a.id, '_blank');
    };
  }]);

  // ---------------------------------------------------------------
  // Login
  // ---------------------------------------------------------------
  app.controller('LoginController', ['$location', 'AuthService', function ($location, AuthService) {
    var vm = this;
    vm.username = '';
    vm.password = '';
    vm.error = '';
    vm.loading = false;

    vm.submit = function () {
      vm.error = '';
      vm.loading = true;
      AuthService.login(vm.username, vm.password).then(
        function () {
          vm.loading = false;
          $location.path('/dashboard');
        },
        function (res) {
          vm.loading = false;
          vm.error = (res.data && res.data.message) || 'Login failed.';
        }
      );
    };
  }]);

  // ---------------------------------------------------------------
  // Customer List
  // ---------------------------------------------------------------
  app.controller('CustomerListController', ['$location', 'CustomerService', function ($location, CustomerService) {
    var vm = this;
    vm.customers = [];
    vm.search = $location.search().q || '';
    vm.loading = true;
    vm.error = '';
    vm.total = 0;
    vm.page = 1;
    vm.perPage = 20;

    function load() {
      vm.loading = true;
      CustomerService.list({ search: vm.search, page: vm.page, per_page: vm.perPage }).then(
        function (data) {
          vm.customers = data.items;
          vm.total = data.total;
          vm.loading = false;
        },
        function (res) {
          vm.error = (res.data && res.data.message) || 'Could not load customers.';
          vm.loading = false;
        }
      );
    }

    vm.doSearch = function () {
      vm.page = 1;
      load();
    };

    vm.nextPage = function () {
      if (vm.page * vm.perPage < vm.total) {
        vm.page++;
        load();
      }
    };
    vm.prevPage = function () {
      if (vm.page > 1) {
        vm.page--;
        load();
      }
    };

    vm.archive = function (customer) {
      if (!confirm('Archive "' + customer.full_name + '"? This hides them from the active list.')) return;
      CustomerService.remove(customer.id).then(load);
    };

    load();
  }]);

  // ---------------------------------------------------------------
  // Customer Form (Add / Edit)
  // ---------------------------------------------------------------
  app.controller('CustomerFormController', ['$location', '$routeParams', 'CustomerService',
    function ($location, $routeParams, CustomerService) {
      var vm = this;
      vm.isEdit = !!$routeParams.id;
      vm.saving = false;
      vm.error = '';
      vm.customer = {
        customer_type: 'Individual',
        full_name: '',
        contact_person: '',
        contact_number: '',
        email: '',
        address: '',
        project_site: '',
        remarks: ''
      };

      if (vm.isEdit) {
        CustomerService.get($routeParams.id).then(function (data) {
          vm.customer = data;
        });
      }

      vm.save = function (form) {
        if (form.$invalid) {
          vm.error = 'Please fill in all required fields correctly.';
          return;
        }
        vm.saving = true;
        vm.error = '';

        var action = vm.isEdit
          ? CustomerService.update($routeParams.id, vm.customer)
          : CustomerService.create(vm.customer);

        action.then(
          function () {
            $location.path('/customers');
          },
          function (res) {
            vm.saving = false;
            vm.error = (res.data && res.data.message) || 'Could not save customer.';
          }
        );
      };

      vm.cancel = function () {
        $location.path('/customers');
      };
    }]);

  // ---------------------------------------------------------------
  // Truck List (simple fleet management, feeds the assignment form)
  // ---------------------------------------------------------------
  app.controller('TruckListController', ['TruckService', function (TruckService) {
    var vm = this;
    vm.trucks = [];
    vm.loading = true;
    vm.error = '';
    vm.showForm = false;
    vm.editingId = null;

    vm.blankTruck = function () {
      return { plate_number: '', truck_type: '', capacity: '', status: 'Available' };
    };
    vm.truck = vm.blankTruck();

    function load() {
      vm.loading = true;
      TruckService.list().then(function (data) {
        vm.trucks = data;
        vm.loading = false;
      });
    }

    vm.newTruck = function () {
      vm.truck = vm.blankTruck();
      vm.editingId = null;
      vm.showForm = true;
    };

    vm.editTruck = function (t) {
      vm.truck = angular.copy(t);
      vm.editingId = t.id;
      vm.showForm = true;
    };

    vm.save = function (form) {
      if (form.$invalid) return;
      var action = vm.editingId
        ? TruckService.update(vm.editingId, vm.truck)
        : TruckService.create(vm.truck);

      action.then(function () {
        vm.showForm = false;
        load();
      }, function (res) {
        vm.error = (res.data && res.data.message) || 'Could not save truck.';
      });
    };

    vm.archive = function (t) {
      if (!confirm('Remove "' + t.plate_number + '" from the active fleet list?')) return;
      TruckService.remove(t.id).then(load);
    };

    vm.cancel = function () {
      vm.showForm = false;
    };

    load();
  }]);

  // ---------------------------------------------------------------
  // Assignment List (receipts)
  // ---------------------------------------------------------------
  app.controller('AssignmentListController', ['AssignmentService', function (AssignmentService) {
    var vm = this;
    vm.assignments = [];
    vm.loading = true;
    vm.search = '';
    vm.status = '';
    vm.total = 0;
    vm.page = 1;
    vm.perPage = 20;

    function load() {
      vm.loading = true;
      AssignmentService.list({ search: vm.search, status: vm.status, page: vm.page, per_page: vm.perPage })
        .then(function (data) {
          vm.assignments = data.items;
          vm.total = data.total;
          vm.loading = false;
        });
    }

    vm.doSearch = function () {
      vm.page = 1;
      load();
    };

    vm.nextPage = function () {
      if (vm.page * vm.perPage < vm.total) { vm.page++; load(); }
    };
    vm.prevPage = function () {
      if (vm.page > 1) { vm.page--; load(); }
    };

    vm.printReceipt = function (a) {
      window.open('print/receipt.html?id=' + a.id, '_blank');
    };

    load();
  }]);

  // ---------------------------------------------------------------
  // Assignment Form (Add / Edit) - assigns a truck to a customer
  // ---------------------------------------------------------------
  app.controller('AssignmentFormController', ['$location', '$routeParams', 'AssignmentService', 'CustomerService', 'TruckService',
    function ($location, $routeParams, AssignmentService, CustomerService, TruckService) {
      var vm = this;
      vm.isEdit = !!$routeParams.id;
      vm.saving = false;
      vm.error = '';
      vm.customers = [];
      vm.trucks = [];

      vm.assignment = {
        customer_id: null,
        truck_id: null,
        driver_name: '',
        service_type: 'Hauling',
        pickup_location: '',
        destination: '',
        duration: '',
        amount: null,
        status: 'Pending',
        remarks: '',
        date_assigned: new Date().toISOString().substring(0, 10)
      };

      vm.justSavedId = null; // set after a successful save; shows the "Print Receipt" panel

      vm.printReceipt = function () {
        window.open('print/receipt.html?id=' + vm.justSavedId, '_blank');
      };

      vm.doneAndBackToList = function () {
        $location.path('/assignments');
      };

      // Customer list for the dropdown (search-as-you-type against the API)
      vm.customerSearch = '';
      vm.loadCustomers = function () {
        CustomerService.list({ search: vm.customerSearch, per_page: 50 }).then(function (data) {
          vm.customers = data.items;
        });
      };
      vm.loadCustomers();

      // Trucks: when editing, include the currently-assigned truck even if
      // its status is no longer "Available".
      function loadTrucks() {
        TruckService.list({ available_only: vm.isEdit ? 0 : 1 }).then(function (data) {
          vm.trucks = data;
        });
      }
      loadTrucks();

      if (vm.isEdit) {
        AssignmentService.get($routeParams.id).then(function (data) {
          vm.assignment = {
            customer_id: data.customer_id,
            truck_id: data.truck_id,
            driver_name: data.driver_name,
            service_type: data.service_type,
            pickup_location: data.pickup_location,
            destination: data.destination,
            duration: data.duration,
            amount: data.amount,
            status: data.status,
            remarks: data.remarks,
            date_assigned: data.date_assigned
          };
        });
      }

      vm.save = function (form) {
        if (form.$invalid) {
          vm.error = 'Please fill in all required fields correctly.';
          return;
        }
        vm.saving = true;
        vm.error = '';

        var action = vm.isEdit
          ? AssignmentService.update($routeParams.id, vm.assignment)
          : AssignmentService.create(vm.assignment);

        action.then(
          function (result) {
            vm.saving = false;
            vm.justSavedId = vm.isEdit ? $routeParams.id : result.id;
          },
          function (res) {
            vm.saving = false;
            vm.error = (res.data && res.data.message) || 'Could not save assignment.';
          }
        );
      };

      vm.cancel = function () {
        $location.path('/assignments');
      };
    }]);

  // ---------------------------------------------------------------
  // Forgot Password
  // ---------------------------------------------------------------
  app.controller('ForgotPasswordController', ['AuthService', function (AuthService) {
    var vm = this;
    vm.identifier = '';
    vm.loading = false;
    vm.message = '';
    vm.error = '';
    vm.submitted = false;

    vm.submit = function () {
      vm.loading = true;
      vm.error = '';
      AuthService.forgotPassword(vm.identifier).then(
        function (data) {
          vm.loading = false;
          vm.submitted = true;
          vm.message = data.message;
        },
        function (res) {
          vm.loading = false;
          vm.error = (res.data && res.data.message) || 'Something went wrong. Please try again.';
        }
      );
    };
  }]);

  // ---------------------------------------------------------------
  // Reset Password
  // ---------------------------------------------------------------
  app.controller('ResetPasswordController', ['$location', 'AuthService', function ($location, AuthService) {
    var vm = this;
    vm.token = $location.search().token || '';
    vm.password = '';
    vm.confirmPassword = '';
    vm.loading = false;
    vm.error = '';
    vm.success = false;

    if (!vm.token) {
      vm.error = 'This reset link is missing its token. Please request a new one.';
    }

    vm.submit = function () {
      vm.error = '';
      if (vm.password !== vm.confirmPassword) {
        vm.error = 'Passwords do not match.';
        return;
      }
      if (vm.password.length < 6) {
        vm.error = 'Password must be at least 6 characters.';
        return;
      }
      vm.loading = true;
      AuthService.resetPassword(vm.token, vm.password).then(
        function () {
          vm.loading = false;
          vm.success = true;
        },
        function (res) {
          vm.loading = false;
          vm.error = (res.data && res.data.message) || 'Could not reset password.';
        }
      );
    };
  }]);

  // ---------------------------------------------------------------
  // Users (staff accounts / logins)
  // ---------------------------------------------------------------
  app.controller('UserListController', ['UserService', function (UserService) {
    var vm = this;
    vm.users = [];
    vm.loading = true;
    vm.error = '';
    vm.showForm = false;
    vm.editingId = null;

    vm.blankUser = function () {
      return { username: '', full_name: '', email: '', password: '' };
    };
    vm.user = vm.blankUser();

    function load() {
      vm.loading = true;
      UserService.list().then(function (data) {
        vm.users = data;
        vm.loading = false;
      });
    }

    vm.newUser = function () {
      vm.user = vm.blankUser();
      vm.editingId = null;
      vm.showForm = true;
      vm.error = '';
    };

    vm.editUser = function (u) {
      vm.user = angular.copy(u);
      vm.user.password = '';
      vm.editingId = u.id;
      vm.showForm = true;
      vm.error = '';
    };

    vm.save = function (form) {
      if (form.$invalid) return;
      vm.error = '';
      var action = vm.editingId
        ? UserService.update(vm.editingId, vm.user)
        : UserService.create(vm.user);

      action.then(function () {
        vm.showForm = false;
        load();
      }, function (res) {
        vm.error = (res.data && res.data.message) || 'Could not save user.';
      });
    };

    vm.remove = function (u) {
      if (!confirm('Remove login access for "' + u.full_name + '"?')) return;
      UserService.remove(u.id).then(load, function (res) {
        alert((res.data && res.data.message) || 'Could not remove user.');
      });
    };

    vm.cancel = function () {
      vm.showForm = false;
    };

    load();
  }]);

})();
