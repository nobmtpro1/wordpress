function ueSimplePopup(popupId){
  
  var g_objPopup, g_objOverlay, g_objPopupWrap;
  var g_isInEditor, g_showErrors, g_source;
  var g_activeClass;
  
  /**
  * empty element id option error handle
  */
  function emptyIdOptionErrorHandle(dataElementId){
    
    if(g_isInEditor == 'no')
    return(false);
    
    if(dataElementId != '')
    return(false);
    
    if(g_showErrors == false)
    return(false);
    
    var errorMessageHtml =  '<div class="uc-editor-message uc-error">Simple Popup Widget Error: Element Id option is empty. Please add Element Id to open it in popup.</div>';
    
    //update popup html to show error message
    g_objPopup.html(errorMessageHtml);
    
  }
  
  /**
  * no element found on the page error handle
  */
  function noElementFoundErrorHandle(objDataElementId, dataElementId){
    
    if(g_isInEditor == 'no')
    return(false);
    
    if(objDataElementId.length)
    return(false);
    
    if(g_showErrors == false)
    return(false);
    
    var errorMessageHtml = '<div class="uc-editor-message uc-error">Simple Popup Widget Error: no Element found with id: "'+dataElementId+'"</div>';
    
    //update popup html to show error message
    g_objPopup.html(errorMessageHtml);
    
  }
  
  /**
  * click on trigger element
  */
  function onFoundElement(dataElementId){
    
    if(g_isInEditor == 'no')
    return(false);
    
    var objPopupElement = jQuery('#'+dataElementId);
    
    if(!objPopupElement.length)
    return(false);
    
    var successMessageHtml = '<div class="uc-editor-message uc-success">Element with id: "'+dataElementId+'" connected.</div> ';
    
    //update popup html to show error message
    g_objPopupWrap.html(successMessageHtml);
    
  }
  
  /*
  * show | hide connected elements in editor
  */ 
  function hideSectionInEditor(objDataElementId){
    
    if(g_isInEditor == 'no')
    return(false);
    
    var dataHideInEditor = g_objPopup.data('hide-connected-elements');
    
    if(dataHideInEditor == true)
    objDataElementId.hide();
    
    if(dataHideInEditor == false)
    objDataElementId.css('display', '');
    
  }
  
  /**
  * append element to popup
  */
  function appendElementToPopup(objDataElementId, dataElementId){
    
    if(g_isInEditor == 'yes'){
      
      onFoundElement(dataElementId);
      
      hideSectionInEditor(objDataElementId);
      
      return(false);
      
    }
    
    //detach popup element
    var objClonedElement = objDataElementId.detach();
    
    //append popup element to popup
    g_objPopupWrap.append(objClonedElement);
    
  }
  
  /**
  * find popup element
  */
  function findPopupElement(){

    if(g_source != 'id')
    return(false);
    
    var dataElementId = g_objPopup.data('element-id');
    
    //if in editor and element id option is not set, show error    
    emptyIdOptionErrorHandle(dataElementId);    
    
    //if in editor and element id object is not exist, show error    
    var objDataElementId = jQuery('#'+dataElementId);
    noElementFoundErrorHandle(objDataElementId, dataElementId);
    
    //detach element
    appendElementToPopup(objDataElementId, dataElementId);    
    
  }
  
  /**
  * debug popup for styling  */
  function debugPopup(){
    
    if(g_isInEditor == 'no')
    return(false);
    
    var isDebugModeOn = g_objPopupWrap.data('debug');
    
    if(isDebugModeOn == false)
    return(false);
    
    //add active class to overlay to open popup
    g_objOverlay.addClass(g_activeClass);
    
  }
  
  /**
  * click on trigger element
  */
  function onOpenPopupClick(){    
    
    if(g_objOverlay.hasClass(g_activeClass) == true)
    return(false);
    
    //dont run in editor
    if(g_isInEditor == 'yes')
    return(true);
    
    g_objOverlay.addClass(g_activeClass);    

    jQuery('body').addClass(g_activeClass);
    
    //trigger elementor popup event
    //jQuery(document).trigger( 'elementor/popup/show');

  }
  
  /**
  * click on close element
  */
  function onClosePopupClick(){
    
    //dont run in editor
    if(g_isInEditor == 'yes')
    return(false);
    
    if(g_objOverlay.hasClass(g_activeClass) == false)
    return(false);
    
    g_objOverlay.removeClass(g_activeClass);

    jQuery('body').removeClass(g_activeClass);
    
  }
  
  function initPopup(){
    
    //init vars
    g_objPopup = jQuery('#'+popupId);
    g_objOverlay = g_objPopup.find('.ue-simple-popup-overlay');
    g_objPopupWrap = g_objPopup.find('.ue-simple-popup-wrapper');
    g_isInEditor = g_objPopup.data('editor');
    g_showErrors = g_objPopup.data('show-errors');
    g_source = g_objPopup.data('source');
    g_activeClass = 'uc-active';
    
    var objOpenPopup = g_objPopup.find('.ue-simple-popup-trigger');
    var objClosePopup = g_objPopup.find('.ue-simple-popup-close');
    
    //find popup element
    findPopupElement();
    
    //debug for styling
    debugPopup();
    
    //init events
    objOpenPopup.on('click', onOpenPopupClick);
    
    objClosePopup.on('click', onClosePopupClick);
    
    g_objOverlay.on("click", function(event){
      
      //close popup unless target isn't popup wrap object (not working in debug mode in editor)
      if (!jQuery(event.target).closest(g_objPopupWrap).length)
      onClosePopupClick();
      
    });
    
  }
  
  initPopup();
  
}