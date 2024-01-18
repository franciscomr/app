import { FormElement } from "./FormElement"

export class FormElementSelect extends FormElement {
  resource: string;
  isRequired: boolean
  constructor(id:string, name:string, type:string, resource:string, isRequired:boolean) {
    super(id,name,type);
    this.resource = resource;
    this.isRequired = isRequired
    this.ensureRequiredIsBoolean(isRequired)
   }

  private ensureRequiredIsBoolean(value:any): void {
    if (typeof value !== "boolean") {
      throw new Error(`${value} value must be Boolean`);

    }
  }
}