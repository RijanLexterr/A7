/* HMCF Prime - Services */
(function () {
  'use strict';

  var app = angular.module('hmcfApp');

  // ---------------------------------------------------------------
  // AuthService - login/logout/session check
  // ---------------------------------------------------------------
  app.service('AuthService', ['$http', 'API_BASE', function ($http, API_BASE) {
    var cachedUser = null;

    this.login = function (username, password) {
      return $http.post(API_BASE + '/auth.php?action=login', {
        username: username,
        password: password
      }).then(function (res) {
        cachedUser = res.data.data;
        return cachedUser;
      });
    };

    this.logout = function () {
      return $http.post(API_BASE + '/auth.php?action=logout', {}).then(function () {
        cachedUser = null;
      });
    };

    this.checkSession = function () {
      return $http.get(API_BASE + '/auth.php?action=check').then(function (res) {
        cachedUser = res.data.data;
        return cachedUser;
      });
    };

    this.forgotPassword = function (identifier) {
      return $http.post(API_BASE + '/auth.php?action=forgot', { identifier: identifier })
        .then(function (res) { return res.data.data; });
    };

    this.resetPassword = function (token, password) {
      return $http.post(API_BASE + '/auth.php?action=reset', { token: token, password: password })
        .then(function (res) { return res.data.data; });
    };

    this.getCachedUser = function () {
      return cachedUser;
    };
  }]);

  // ---------------------------------------------------------------
  // Generic REST helper factory - used by Customers/Trucks/Assignments
  // ---------------------------------------------------------------
  function restResource($http, baseUrl) {
    return {
      list: function (params) {
        return $http.get(baseUrl, { params: params || {} }).then(function (res) {
          return res.data.data;
        });
      },
      get: function (id) {
        return $http.get(baseUrl, { params: { id: id } }).then(function (res) {
          return res.data.data;
        });
      },
      create: function (payload) {
        return $http.post(baseUrl, payload).then(function (res) {
          return res.data.data;
        });
      },
      update: function (id, payload) {
        return $http.put(baseUrl + '?id=' + id, payload).then(function (res) {
          return res.data.data;
        });
      },
      remove: function (id) {
        return $http.delete(baseUrl + '?id=' + id).then(function (res) {
          return res.data.data;
        });
      }
    };
  }

  app.service('CustomerService', ['$http', 'API_BASE', function ($http, API_BASE) {
    return restResource($http, API_BASE + '/customers.php');
  }]);

  app.service('TruckService', ['$http', 'API_BASE', function ($http, API_BASE) {
    return restResource($http, API_BASE + '/trucks.php');
  }]);

  app.service('AssignmentService', ['$http', 'API_BASE', function ($http, API_BASE) {
    return restResource($http, API_BASE + '/assignments.php');
  }]);

  app.service('UserService', ['$http', 'API_BASE', function ($http, API_BASE) {
    return restResource($http, API_BASE + '/users.php');
  }]);

  app.service('DashboardService', ['$http', 'API_BASE', function ($http, API_BASE) {
    return {
      get: function () {
        return $http.get(API_BASE + '/dashboard.php').then(function (res) {
          return res.data.data;
        });
      }
    };
  }]);

})();
