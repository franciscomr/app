interface Format {
  readonly type:string
  readonly id:string
  readonly attributes:object
  readonly relationships?:object
}

export class JsonApi implements Format {
  type:string
  id:string
  attributes:object
  relationships?:object

  constructor(  type:string, id:string, attributes:object, relationships?:object) {
    this.type = type
    this.id = id
    this.attributes = attributes
    this.relationships = relationships
  }

}