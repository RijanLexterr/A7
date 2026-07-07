/* HMCF Prime - AngularJS App Module & Routes */
(function () {
  'use strict';

  var app = angular.module('hmcfApp', ['ngRoute']);

  app.constant('API_BASE', 'api');

  app.config(['$routeProvider', '$locationProvider', function ($routeProvider) {

    $routeProvider
      .when('/login', {
        templateUrl: 'partials/login.html',
        controller: 'LoginController',
        controllerAs: 'vm',
        public: true
      })
      .when('/forgot-password', {
        templateUrl: 'partials/forgot-password.html',
        controller: 'ForgotPasswordController',
        controllerAs: 'vm',
        public: true
      })
      .when('/reset-password', {
        templateUrl: 'partials/reset-password.html',
        controller: 'ResetPasswordController',
        controllerAs: 'vm',
        public: true
      })
      .when('/', {
        redirectTo: '/dashboard'
      })
      .when('/dashboard', {
        templateUrl: 'partials/dashboard.html',
        controller: 'DashboardController',
        controllerAs: 'vm'
      })
      .when('/customers', {
        templateUrl: 'partials/customer-list.html',
        controller: 'CustomerListController',
        controllerAs: 'vm'
      })
      .when('/customers/new', {
        templateUrl: 'partials/customer-form.html',
        controller: 'CustomerFormController',
        controllerAs: 'vm'
      })
      .when('/customers/:id/edit', {
        templateUrl: 'partials/customer-form.html',
        controller: 'CustomerFormController',
        controllerAs: 'vm'
      })
      .when('/trucks', {
        templateUrl: 'partials/truck-list.html',
        controller: 'TruckListController',
        controllerAs: 'vm'
      })
      .when('/assignments', {
        templateUrl: 'partials/assignment-list.html',
        controller: 'AssignmentListController',
        controllerAs: 'vm'
      })
      .when('/assignments/new', {
        templateUrl: 'partials/assignment-form.html',
        controller: 'AssignmentFormController',
        controllerAs: 'vm'
      })
      .when('/assignments/:id/edit', {
        templateUrl: 'partials/assignment-form.html',
        controller: 'AssignmentFormController',
        controllerAs: 'vm'
      })
      .when('/users', {
        templateUrl: 'partials/user-list.html',
        controller: 'UserListController',
        controllerAs: 'vm'
      })
      .otherwise({ redirectTo: '/dashboard' });
  }]);

  // ---- Route guard: bounce to /login if the session isn't valid ----
  app.run(['$rootScope', '$location', '$route', 'AuthService', function ($rootScope, $location, $route, AuthService) {

    $rootScope.currentUser = null;
    var sessionChecked = false;

    $rootScope.$on('$routeChangeStart', function (event, next) {
      if (next && next.public) {
        return; // login page is always reachable
      }
      if (AuthService.getCachedUser()) {
        $rootScope.currentUser = AuthService.getCachedUser();
        return;
      }
      if (sessionChecked) {
        event.preventDefault();
        $location.path('/login');
        return;
      }
      event.preventDefault();
      AuthService.checkSession().then(
        function (user) {
          sessionChecked = true;
          $rootScope.currentUser = user;
          $route.reload();
        },
        function () {
          sessionChecked = true;
          $location.path('/login');
        }
      );
    });

    $rootScope.logout = function () {
      AuthService.logout().finally(function () {
        $rootScope.currentUser = null;
        $location.path('/login');
      });
    };
  }]);

})();
