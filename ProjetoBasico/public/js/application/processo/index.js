var objApplication = angular.module(
    'Application',
    []
);

objApplication.controller(
    'indexProcessoController',
    function ($scope) {

        $scope.adicionarNovo = function()
        {
            document.location = './processos/formulario';
        }
    }
);