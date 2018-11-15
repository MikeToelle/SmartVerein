
plugin.tx_vmmember_memberlist {
  view {
    templateRootPaths.0 = EXT:vm_member/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_vmmember_memberlist.view.templateRootPath}
    partialRootPaths.0 = EXT:vm_member/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_vmmember_memberlist.view.partialRootPath}
    layoutRootPaths.0 = EXT:vm_member/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_vmmember_memberlist.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_vmmember_memberlist.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_vmmember_memberprofil {
  view {
    templateRootPaths.0 = EXT:vm_member/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.templateRootPath}
    partialRootPaths.0 = EXT:vm_member/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.partialRootPath}
    layoutRootPaths.0 = EXT:vm_member/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_vmmember_memberprofil.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_vmmember_personalsetting {
  view {
    templateRootPaths.0 = EXT:vm_member/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.templateRootPath}
    partialRootPaths.0 = EXT:vm_member/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.partialRootPath}
    layoutRootPaths.0 = EXT:vm_member/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_vmmember_memberprofil.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_vmmember_csvimport {
  view {
    templateRootPaths.0 = EXT:vm_member/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.templateRootPath}
    partialRootPaths.0 = EXT:vm_member/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.partialRootPath}
    layoutRootPaths.0 = EXT:vm_member/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_vmmember_csvimport.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_vmmember_adminrole {
  view {
    templateRootPaths.0 = EXT:vm_member/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.templateRootPath}
    partialRootPaths.0 = EXT:vm_member/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.partialRootPath}
    layoutRootPaths.0 = EXT:vm_member/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_vmmember_adminrole.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_vmmember_memberdata {
  view {
    templateRootPaths.0 = EXT:vm_member/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.templateRootPath}
    partialRootPaths.0 = EXT:vm_member/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.partialRootPath}
    layoutRootPaths.0 = EXT:vm_member/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_vmmember_adminrole.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_vmmember_departments {
  view {
    templateRootPaths.0 = EXT:vm_member/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.templateRootPath}
    partialRootPaths.0 = EXT:vm_member/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.partialRootPath}
    layoutRootPaths.0 = EXT:vm_member/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_vmmember_adminrole.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_vmmember_functions {
  view {
    templateRootPaths.0 = EXT:vm_member/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.templateRootPath}
    partialRootPaths.0 = EXT:vm_member/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.partialRootPath}
    layoutRootPaths.0 = EXT:vm_member/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_vmmember_memberprofil.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_vmmember_adminrole.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}
