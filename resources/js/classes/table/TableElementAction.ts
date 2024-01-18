interface Format {
  id:string
  name:string
  routeName:string
  iconName:string
  confirmationRequired: boolean
}

export class TableElementAction implements Format {
  id:string
  name:string
  routeName:string
  iconName:string
  confirmationRequired: boolean

  constructor(id:string, name:string, routeName:string, iconName:string, confirmationRequired: boolean) {
    this.id = id
    this.name = name
    this.routeName=routeName
    this.iconName= iconName
    this.confirmationRequired = confirmationRequired
  }
}