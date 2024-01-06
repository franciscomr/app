interface Format {
  readonly id:string
  readonly name:string
  readonly resource:string
}

export class RelatedTableElement implements Format {
  id:string
  name:string
  resource: string

  constructor(  id:string, name:string, resource:string) {
    this.id = id
    this.name = name
    this.resource= resource
  }
}