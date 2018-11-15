
plugin.tx_vmclub_clubmanager {
  view {
    templateRootPaths.0 = EXT:vm_club/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_vmclub_clubmanager.view.templateRootPath}
    partialRootPaths.0 = EXT:vm_club/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_vmclub_clubmanager.view.partialRootPath}
    layoutRootPaths.0 = EXT:vm_club/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_vmclub_clubmanager.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_vmclub_clubmanager.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
  settings {
    loginPage = {$plugin.tx_vmclub_clubmanager.settings.loginPage}
    #setupPage = {$setupPage}
  }
}
