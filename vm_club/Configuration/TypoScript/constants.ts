
plugin.tx_vmclub_clubmanager {
  view {
    # cat=SmartVerein Club module/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:vm_club/Resources/Private/Templates/
    # cat=SmartVerein Club module/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:vm_club/Resources/Private/Partials/
    # cat=SmartVerein Club module/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:vm_club/Resources/Private/Layouts/
  }
  persistence {
    # cat=SmartVerein Club module//a; type=string; label=Default storage PID
    storagePid =
  }
  settings {
    # cat=SmartVerein Club module//a; type=int; label=Loginpage PID
    loginPage =
    #setupPage = {$setupPage}
  }
}
